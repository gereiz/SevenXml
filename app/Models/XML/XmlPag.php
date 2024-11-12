<?php

namespace App\Models\XML;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlPag extends Model
{
    use HasFactory;

    protected $table = 'xml_pag';

    protected $fillable = [
        'v_pag',
        'id_nf'
    ];

    public $timestamps = false;
}
