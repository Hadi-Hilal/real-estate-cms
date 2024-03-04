<?php

namespace Modules\Contact\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Contact\app\Exports\ContactExport;
use Modules\Contact\app\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $this->setActive('contacts');
        $contacts = Contact::paginate($this->pageSize());
        return view('contact::admin.index' , compact('contacts'));
    }

    public function export()
    {
        return Excel::download(new ContactExport, '#contacts.xlsx');
    }

    public function deleteMulti(Request $request)
    {
        $ids = $request->input('ids');
        Contact::destroy($ids);
        session()->flash('success', __('Contacts Deleted Successfully'));
        return redirect()->back();
    }


}
