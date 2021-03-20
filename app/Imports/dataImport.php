<?php

namespace App\Imports;

use App\Models\data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class dataImport implements ToModel, WithHeadingRow {

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new data([
            'idWilayah' => $row['id_wilayah'],
            'idSektor' => $row['id_sektor'],
            'tahun' => $row['tahun'],
            'pdrb' => $row['pdrb']
        ]);
    }

}
