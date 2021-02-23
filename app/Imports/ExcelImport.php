<?php

namespace App\Imports;


use App\Models\DataImport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataImport([
            'komoditi'=>$row['komoditi'],
            'output'=>$row['output'],
            'konsumsiantara'=>$row['konsumsi_antara'],
            'pajakkurangsubsidi'=>$row['pajak_kurang_subsidi']
        ]);
    }
}
