<?php

namespace Modules\Subscriber\app\Imports;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Modules\Subscriber\app\Models\Subscriber;

class SubscriberImport implements ToModel, WithUpserts, WithValidation, WithHeadingRow, WithStartRow
{
    use Importable;

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'email';
    }

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {

        return new Subscriber([
            'email' => $row['email'],
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email'
            ],
        ];
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Skip the first row (header)
    }

}
