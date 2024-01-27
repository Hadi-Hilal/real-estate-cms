<?php

namespace Modules\Subscriber\app\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Subscriber\app\Models\Subscriber;

class SubscriberExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'email'
        ];
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return Subscriber::select('email')->get();
    }
}
