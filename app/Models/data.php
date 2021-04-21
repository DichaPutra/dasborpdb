<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model {

    use HasFactory;

    protected $table = 'data';
    protected $fillable = ['idWilayah', 'idSektor', 'tahun', 'pdrb', 'idUser'];
    public $timestamps = false;

    public function wilayah()
    {
        return $this->belongsTo('App\Models\wilayah');
    }

    public function sektor()
    {
        return $this->belongsTo('App\Models\sektor');
    }

}
