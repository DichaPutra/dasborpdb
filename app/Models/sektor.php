<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sektor extends Model {

    use HasFactory;

    protected $table = 'sektor';
    public $timestamps = false;

    public function data()
    {
        return $this->hasMany('App\Models\data');
    }

}