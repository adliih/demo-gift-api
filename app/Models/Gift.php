<?php

namespace App\Models;

use App\Models\Gifts\Review;
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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function isAlreadyReviewedByUser(int $userId): bool
    {
        return $this->reviews->contains('user_id', $userId);
    }

    public function addReview(int $userId, int $rating): Review
    {
        $oldReviewCount = $this->reviews->count();
        $oldTotalReviewValue = $this->reviews->sum('rating');
        $review = $this->reviews()->create([
            'rating' => $rating,
            'user_id' => $userId,
        ]);

        $this->rating = ($oldTotalReviewValue + $rating) / ($oldReviewCount + 1);

        return $review;
    }
}
