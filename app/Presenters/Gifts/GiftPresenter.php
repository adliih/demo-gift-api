<?php

namespace App\Presenters\Gifts;

use App\Models\Gift;

class GiftPresenter
{
    public function transform(Gift $gift)
    {
        return [
            'id' => $gift->id,
            'name' => $gift->name,
            'rating' => $gift->rating,
            'review_count' => $gift->reviews_count ?? 0, // FIXME
            'price' => $gift->price,
            'qty' => $gift->qty,
            'description' => $gift->description,
            'badge_type' => null, // FIXME
            'is_favourited' => null // FIXME
        ];
    }
}
