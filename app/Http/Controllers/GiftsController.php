<?php

namespace App\Http\Controllers;

use App\Presenters\Gifts\GiftPresenter;
use Illuminate\Http\Request;

class GiftsController extends Controller
{

    private GiftPresenter $presenter;

    public function __construct(GiftPresenter $presenter) {
        $this->presenter = $presenter;
    }

    public function index()
    {
        return [
            'gifts' => collect()->map(fn($gift) => $this->presenter->transform($gift)),
        ];
    }

    public function show(int $id)
    {
        $gift = null;
        return [
            'gift' => $this->presenter->transform($gift),
        ];
    }

    public function store(Request $request)
    {
        $gift = $request->json();
        return [
            'gift' => $this->presenter->transform($gift),
        ];
    }

    public function update(int $id, Request $request)
    {
        $gift = $request->json();
        return [
            'gift' => $this->presenter->transform($gift),
        ];
    }

    public function destroy(int $id)
    {
        $gift = null;
        return [
            'gift' => $this->presenter->transform($gift),
        ];
    }
}
