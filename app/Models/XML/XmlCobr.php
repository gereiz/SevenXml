<?php

namespace App\Models\XML;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlCobr extends Model
{
    use HasFactory;

    protected $table = 'xml_cobr';

    protected $fillable = [
        'n_fat',
        'v_orig',
        'v_liq',
        'd_venc',
        'v_dup',
        'id_nf'
    ];

    public $timestamps = false;
}
