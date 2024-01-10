<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mst_CP_Empresas extends Model
{
    use HasFactory;
    protected $table = 'mst_CP_Empresas';
    protected $primaryKey = 'vchEmpresaID';

    public $timestamps = false;

    protected $guarded = [
        // 'vchEmpresaID',
        'created_at',
        'updated_at'
    ];

}
