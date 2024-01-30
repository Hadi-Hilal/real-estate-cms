<?php

namespace Modules\Page\app\Repositories;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Modules\Core\app\Traits\FileTrait;
use Modules\Page\app\Http\Requests\PageRequest;
use Modules\Page\app\Models\Page;

class PageModelRepository implements PageRepository
{
use FileTrait;
    protected $pageUploadPath = 'pages';
public function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator
{
    return Page::select($columns)
        ->when($request->has('publish') and $request->query('publish'), function ($q) use ($request) {
            $q->where('publish', $request->query('publish'));
        })
        ->when($request->has('type') and $request->query('type'), function ($q) use ($request) {
            $q->where('type', $request->query('type'));
        })->paginate(Config::get('core.page_size'));
}
    public function store(PageRequest $request): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->pageUploadPath, $request->input('slug'));
        } else {
            session()->flash('error', __('The Client Image Is Required'));
            return false;
        }
        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ' ,$valuesArray);

        $request->merge([
            'image' => $path,
            'keywords' => $keywords ,
            'publish' => $request->has('publish') ? 'Published' : 'Archived',
            'featured' => $request->has('featured') ? 1 : 0,
        ]);
        try {
            Page::create($request->all());
            cache()->forget('pages');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(PageRequest $request, Page $page): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->pageUploadPath, $request->input('slug'), $page->image);
            $request->merge([
                'image' => $path,
            ]);
        }
        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ' ,$valuesArray);

        $request->merge([
            'keywords' => $keywords ,
            'publish' => $request->has('publish') ? 'Published' : 'Archived',
            'featured' => $request->has('featured') ? 1 : 0,
        ]);
        try {
            $page->update($request->all());
            cache()->forget('pages');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $pageImages = Page::whereIn('id', $ids)->pluck('image')->toArray();
            Page::destroy($ids);
            $this->deleteFile($pageImages);
            cache()->forget('pages');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }
}
