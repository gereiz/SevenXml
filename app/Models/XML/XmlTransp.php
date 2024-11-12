<?php

namespace App\Models\XML;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlTransp extends Model
{
    use HasFactory;

    protected $table = 'xml_transp';

    protected $fillable = [
        'nome',
        'q_vol',
        'esp',
        'peso_liq',
        'peso_bru',
        'id_nf'
    ];

    public $timestamps = false;
}
