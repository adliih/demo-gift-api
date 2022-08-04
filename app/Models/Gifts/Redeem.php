<?php

namespace App\Models\Gifts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Gift;

class Redeem extends Model
{
    use HasFactory;

    public $table = 'gifts_redeems';

    // only disable updated_at built-in timestamp
    const UPDATED_AT = null;

    public $fillable = [
        'qty',
        'user_id',
        'gift_id',
        'created_at',
    ];

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
