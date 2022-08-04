<?php

namespace App\Http\Controllers\Gifts;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Presenters\Gifts\RatingPresenter;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RatingController extends Controller
{


    public function rating(Gift $gift, Request $request, RatingPresenter $presenter)
    {
        $request->validate([
            'rating' => [
                'numeric',
                'min:1',
                'max:5'
            ],
        ]);
        $rating = $request->rating;
        $userId = $request->user()->id;

        // check is gift already rated by user
        if ($gift->isAlreadyReviewedByUser($userId)) {
            throw new UnprocessableEntityHttpException("You already rate this gift");
        }

        // create a new review data
        $review = $gift->addReview($userId, $rating);

        return [
            'rating' => $presenter->transform($review)
        ];
    }
}
