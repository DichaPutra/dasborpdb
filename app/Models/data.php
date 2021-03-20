<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model {

    use HasFactory;

    protected $table = 'data';
    protected $fillable = ['idWilayah', 'idSektor', 'tahun', 'pdrb'];
    public $timestamps = false;

}
