<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class excelformat extends Model {

    use HasFactory;

    protected $table = 'excelformat';
    protected $fillable = ['idWilayah', 'idSektor', 'tahun', 'pdrb'];
    public $timestamps = false;

}
