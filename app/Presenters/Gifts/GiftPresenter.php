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
            'rating' => round($gift->rating),
            // using ?? because we only show count when relation count is loaded
            'review_count' => $gift->reviews_count ?? 0,
            'price' => $gift->price,
            'qty' => $gift->qty,
            'description' => $gift->description,
            'badge_type' => null, // FIXME
            'is_favourited' => null // FIXME
        ];
    }
}
