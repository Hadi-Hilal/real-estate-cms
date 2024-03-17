<?php

namespace Modules\Contact\app\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Contact\app\Models\Contact;

class ContactExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'name', 'phone_code', 'phone_number', 'email', 'subject'
        ];
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return Contact::select('name', 'phone_code', 'phone_number', 'email', 'subject')->get();
    }
}
