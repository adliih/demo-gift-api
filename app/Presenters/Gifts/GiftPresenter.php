<?php

namespace App\Presenters\Gifts;

class GiftPresenter
{
    public function transform($gift)
    {
        return [
            'id' => 1,
            'name' => "lorem",
            'review' => 4,
            'review_count' => 100,
            'price' => 0,
            'qty' => 1,
            'description' => "lorem ipsum",
            'badge_type' => 'new',
            'is_favourited' => true
        ];
    }
}
