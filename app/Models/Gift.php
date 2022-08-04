<?php

namespace App\Models;

use App\Models\Gifts\Redeem;
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

    public function redeems()
    {
        return $this->hasMany(Redeem::class);
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
        $review->setRelation('gift', $this);

        $this->rating = ($oldTotalReviewValue + $rating) / ($oldReviewCount + 1);
        $this->save();

        return $review;
    }

    public function addRedeem(int $userId, int $qty): Redeem
    {
        $redeem = $this->redeems()->create([
            'qty' => $qty,
            'user_id' => $userId,
            'created_at' => now(),
        ]);
        $redeem->setRelation('gift', $this);

        $this->qty -= $qty;
        $this->save();

        return $redeem;
    }
}
