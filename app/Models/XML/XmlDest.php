<?php

namespace App\Models\XML;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlDest extends Model
{
    use HasFactory;

    protected $table = 'xml_dest';

    protected $fillable = [
        'cnpj',
        'nome',
        'logradouro',
        'numero',
        'bairro',
        'municipio',
        'uf',
        'cep',
        'indIEDest',
        'insc_est',
        'id_nf'
    ];

    public $timestamps = false;
}
