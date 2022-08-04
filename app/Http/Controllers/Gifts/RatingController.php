<?php

namespace App\Http\Controllers\Gifts;

use App\Http\Controllers\Controller;
use App\Presenters\Gifts\RatingPresenter;
use Illuminate\Http\Request;

class RatingController extends Controller
{


    public function rating(int $id, Request $request, RatingPresenter $presenter)
    {
        $request->validate([
            'rating' => [
                'numeric',
                'min:1',
                'max:5'
            ],
        ]);

        $rating = $request->rating;

        return [
            'rating' => $presenter->transform($rating)
        ];
    }
}
