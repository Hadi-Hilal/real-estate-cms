<?php

namespace Modules\Property\app\Repositories;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use Modules\Core\app\Traits\FileTrait;
use Modules\Property\app\Http\Requests\PropertyRequest;
use Modules\Property\app\Jobs\NotifiyPropertySubscribersJon;
use Modules\Property\app\Models\Property;

class PropertyModelRepository implements PropertyRepository
{
    use FileTrait;

    private string $propertyUploadPath = 'properties';

    public function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator
    {
        return Property::select($columns)
            ->when($request->has('publish') and $request->query('publish'), function ($q) use ($request) {
                $q->where('publish', $request->query('publish'));
            })->paginate(Config::get('core.page_size'));
    }

    public function store(PropertyRequest $request): bool
    {
        $dir = $this->propertyUploadPath . '/' . $request->input('slug');
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $dir);
        } else {
            session()->flash('error', __('The Client Image Is Required'));
            return false;
        }
        $slides = [];
        if ($request->has('img_slides')) {
            foreach ($request->file('img_slides') as $slide) {
                $slides[] = $this->upload($slide, $dir);
            }
        }

        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ', $valuesArray);

        $request->merge([
            'image' => $path,
            'slides' => json_encode($slides),
            'keywords' => $keywords,
            'publish' => $request->has('publish') ? 'published' : 'archived',
            'featured' => $request->has('featured') ? 1 : 0,
        ]);
        try {
            $property = Property::create($request->all());
            $property->features()->attach($request->input('property_features'));
            if ($request->has('notification') && $request->input('notification') == '1') {
                NotifiyPropertySubscribersJon::dispatch($property);
            }
            cache()->forget('properties');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(PropertyRequest $request, Property $property): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->propertyUploadPath, $request->input('slug'), $property->image);
            $request->merge([
                'image' => $path,
            ]);
        }
        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ', $valuesArray);

        $request->merge([
            'keywords' => $keywords,
            'publish' => $request->has('publish') ? 'published' : 'archived',
            'featured' => $request->has('featured') ? 1 : 0,
        ]);
        try {
            $property->update($request->all());
            cache()->forget('properties');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $propertyDirImages = Property::whereIn('id', $ids)->pluck('slug')->toArray();
            Property::destroy($ids);
            $this->deleteFile($this->propertyUploadPath . '/' . $propertyDirImages);
            cache()->forget('properties');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }
}
