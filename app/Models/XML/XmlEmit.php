<?php

namespace App\Models\XML;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlEmit extends Model
{
    use HasFactory;

    protected $table = 'xml_emit';

    protected $fillable = [
        'cnpj',
        'nome',
        'municipio',
        'uf',
        'cep',
        'c_pais',
        'x_pais',
        'insc_est',
        'id_nf'
    ];

    public $timestamps = false;
}
