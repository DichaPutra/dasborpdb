<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wilayah extends Model {

    use HasFactory;

    protected $table = 'wilayah';
    public $timestamps = false;

    public function data()
    {
        return $this->hasMany('App\Models\data');
    }

}
