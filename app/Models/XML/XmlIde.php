<?php

namespace App\Models\XML;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlIde extends Model
{
    use HasFactory;

    protected $table = 'xml_ide';

    protected $fillable = [
        'c_uf',
        'c_nf',
        'n_nf'
    ];

    public $timestamps = false;
}
