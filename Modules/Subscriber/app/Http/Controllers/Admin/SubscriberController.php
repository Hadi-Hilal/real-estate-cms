<?php

namespace Modules\Subscriber\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Subscriber\app\Exports\SubscriberExport;
use Modules\Subscriber\app\Imports\SubscriberImport;
use Modules\Subscriber\app\Models\Subscriber;

class SubscriberController extends Controller
{

    public function index()
    {
        $this->setActive('subscribers');
        $subscribers = Subscriber::paginate($this->pageSize());
        return view('subscriber::admin.index', compact('subscribers'));
    }

    public function deleteMulti(Request $request)
    {
        $ids = $request->input('ids');
        Subscriber::destroy($ids);
        session()->flash('success', __('Subscribers Deleted Successfully'));
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new SubscriberExport, '#subscribers.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:csv,xlsx,xls',
        ]);
        $file = $request->file('excel_file');
        Excel::import(new SubscriberImport(), $file);
        session()->flash('success', __('Subscribers Excel file has been imported successfully'));
        return redirect()->back();
    }
}
