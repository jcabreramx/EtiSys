<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eti_Puestos extends Model
{
    use HasFactory;
    protected $table = 'eti_Puestos';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];
}
