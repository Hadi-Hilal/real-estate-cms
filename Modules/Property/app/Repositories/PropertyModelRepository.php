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
            })
            ->when($request->has('country_id') and $request->query('country_id'), function ($q) use ($request) {
                $q->where('country_id', $request->query('country_id'));
            })
            ->when($request->has('category') and $request->query('category'), function ($q) use ($request) {
                $q->where('category', $request->query('category'));
            })
            ->paginate(Config::get('core.page_size'));
    }

    public function store(PropertyRequest $request): bool
    {
        $dir = $this->propertyUploadPath . '/' . $request->input('slug');
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $dir, 'main-image');
        } else {
            session()->flash('error', __('The Client Image Is Required'));
            return false;
        }
        $slides = [];
        if ($request->has('img_slides')) {
            foreach ($request->file('img_slides') as $key => $slide) {
                $slides[] = $this->upload($slide, $dir, $key + 1);
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
            'citizenship' => $request->has('citizenship') ? 1 : 0
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
        $dir = $this->propertyUploadPath . '/' . $property->slug;
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $dir, 'main-image', $property->image);
            $request->merge([
                'image' => $path,
            ]);
        }

        if ($request->has('img_slides')) {
            $slides = [];
            $this->deleteFile($property->slides);
            foreach ($request->file('img_slides') as $key => $slide) {
                $slides[] = $this->upload($slide, $dir, $key + 1);
            }
            $request->merge([
                'slides' => json_encode($slides),
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
            'citizenship' => $request->has('citizenship') ? 1 : 0
        ]);
        try {
            $property->update($request->all());
            $property->features()->sync($request->input('property_features'));
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
            $properties = Property::whereIn('id', $ids)->get();

            foreach ($properties as $property) {
                if ($property->features()->exists()) {
                    $property->features()->detach();
                }
                $this->deleteDir($this->propertyUploadPath . '/' . $property->slug);
                $property->delete();
            }

            cache()->forget('properties');

            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return false;
    }

}
