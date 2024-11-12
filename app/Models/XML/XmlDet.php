<?php

namespace App\Models\XML;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlDet extends Model
{
    use HasFactory;

    protected $table = 'xml_det';

    protected $fillable = [
        'c_prod',
        'produto',
        'u_comp',
        'q_comp',
        'v_un_comp',
        'v_prod',
        'u_trib',
        'q_trib',
        'v_un_trib',
        'v_ipi',
        'id_nf'

    ];

    public $timestamps = false;
}
