<?php

namespace App\Exports;

use App\Models\excelformat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class excelformatExport implements FromCollection, WithHeadings {

    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    public function headings(): array
    {
        return [
            'ID Wilayah',
            'ID Sektor',
            'Tahun',
            'PDRB',
        ];
    }

    public function collection()
    {
        return excelformat::all();
    }

}
