<?php

namespace App\Models\Gifts;

use App\Models\Gift;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $table = 'gifts_reviews';
    public $timestamps = false;

    public $fillable = [
        'rating',
        'user_id',
        'gift_id',
    ];

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
