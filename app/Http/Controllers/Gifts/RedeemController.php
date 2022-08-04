<?php

namespace App\Http\Controllers\Gifts;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Presenters\Gifts\RedeemPresenter;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RedeemController extends Controller
{

    public function redeem(Gift $gift, Request $request, RedeemPresenter $presenter)
    {
        if ($gift->qty <= 0) {
            throw new UnprocessableEntityHttpException("Gift already out of stock");
        }

        $request->validate([
            'qty' => [
                'numeric',
                'min:1',
                'max:' . $gift->qty,
            ],
        ]);

        $redeem = $gift->addRedeem(
            $request->user()->id,
            $request->qty
        );

        return [
            'redeem' => $presenter->transform($redeem)
        ];
    }
}
