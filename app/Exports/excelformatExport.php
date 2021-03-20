<?php

namespace App\Exports;

use App\Models\excelformat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class excelformatExport implements FromCollection, WithHeadings, WithTitle {

    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    public function title(): string
    {
        return 'Data';
    }

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
