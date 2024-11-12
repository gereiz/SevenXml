<?php

namespace App\Models\XML;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlTotal extends Model
{
    use HasFactory;

    protected $table = 'xml_total';

    protected $fillable = [
        'v_prod',
        'v_ipi',
        'v_nf',
        'id_nf'
    ];

    public $timestamps = false;
}
