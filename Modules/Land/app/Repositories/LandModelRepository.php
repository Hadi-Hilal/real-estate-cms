<?php

namespace Modules\Land\app\Repositories;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use Modules\Core\app\Traits\FileTrait;
use Modules\Land\app\Http\Requests\LandRequest;
use Modules\Land\app\Models\Land;

class LandModelRepository implements LandRepository
{
    use FileTrait;

    private string $landUploadPath = 'lands';

    public function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator
    {
        return Land::select($columns)
            ->when($request->has('publish') and $request->query('publish'), function ($q) use ($request) {
                $q->where('publish', $request->query('publish'));
            })
            ->when($request->has('country_id') and $request->query('country_id'), function ($q) use ($request) {
                $q->where('country_id', $request->query('country_id'));
            })
            ->paginate(Config::get('core.page_size'));
    }

    public function store(LandRequest $request): bool
    {
        $dir = $this->landUploadPath . '/' . $request->input('slug');
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
            $land = Land::create($request->all());
            $land->features()->attach($request->input('land_features'));
            cache()->forget('lands');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(LandRequest $request, Land $land): bool
    {
        $dir = $this->landUploadPath . '/' . $land->slug;
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $dir, 'main-image', $land->image);
            $request->merge([
                'image' => $path,
            ]);
        }

        if ($request->has('img_slides')) {
            $slides = [];
            $this->deleteFile($land->slides);
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
            $land->update($request->all());
            $land->features()->sync($request->input('land_features'));
            cache()->forget('lands');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $lands = Land::whereIn('id', $ids)->get();

            foreach ($lands as $land) {
                if ($land->features()->exists()) {
                    $land->features()->detach();
                }
                $this->deleteDir($this->landUploadPath . '/' . $land->slug);
                $land->delete();
            }

            cache()->forget('lands');

            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return false;
    }
}
