<?php

namespace App\Presenters\Gifts;

use App\Models\Gifts\Redeem;

class RedeemPresenter
{

    private $giftPresenter;

    public function __construct(GiftPresenter $giftPresenter) {
        $this->giftPresenter = $giftPresenter;
    }

    public function transform(Redeem $redeem)
    {
        return [
            'id' => $redeem->id,
            'qty' => $redeem->qty,
            'redeemed_at' => $redeem->created_at,
            'gift' => $this->transformGift($redeem)
        ];
    }

    private function transformGift(Redeem $redeem)
    {
        if (!$redeem->relationLoaded('gift')) {
            return null;
        }
        return $this->giftPresenter->transform($redeem->gift);
    }
}
