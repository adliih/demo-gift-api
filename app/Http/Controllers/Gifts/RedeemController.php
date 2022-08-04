<?php

namespace App\Http\Controllers\Gifts;

use App\Http\Controllers\Controller;
use App\Presenters\Gifts\RedeemPresenter;
use Illuminate\Http\Request;

class RedeemController extends Controller
{

    public function redeem(int $id, Request $request, RedeemPresenter $presenter)
    {
        $request->validate([
            'qty' => [
                'numeric',
                'min:1',
            ],
        ]);

        $redeem = $request->qty;

        return [
            'redeem' => $presenter->transform($redeem)
        ];
    }
}
