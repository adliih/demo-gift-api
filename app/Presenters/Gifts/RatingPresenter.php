<?php

namespace App\Presenters\Gifts;

use App\Models\Gifts\Review;

class RatingPresenter
{

    private $giftPresenter;

    public function __construct(GiftPresenter $giftPresenter) {
        $this->giftPresenter = $giftPresenter;
    }

    public function transform(Review $review)
    {
        return [
            'id' => $review->id,
            'rating' => $review->rating,
            'gift_id' => $review->gift_id,
            'gift' => $this->transformGift($review),
        ];
    }

    private function transformGift(Review $review)
    {
        if (!$review->relationLoaded('gift')) {
            return null;
        }
        return $this->giftPresenter->transform($review->gift);
    }
}
