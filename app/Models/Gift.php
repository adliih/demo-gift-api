<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'gifts';
    public $timestamps = false;

    public $fillable = [
        'name',
        'price',
        'qty',
        'description',
    ];
}
