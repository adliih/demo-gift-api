<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Presenters\Gifts\GiftPresenter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GiftsController extends Controller
{

    private const SORT_BY_NEWEST = 'NEWEST';
    private const SORT_BY_RATING = 'RATING';
    private const SORT_DIRECTION_ASC = 'ASC';
    private const SORT_DIRECTION_DESC = 'DESC';

    private const SORT_CONFIGURATION_MAP = [
        self::SORT_BY_NEWEST => [
            self::SORT_DIRECTION_ASC => ['id', 'desc'],
            self::SORT_DIRECTION_DESC => ['id', 'asc'],
        ],
        self::SORT_BY_RATING => [
            self::SORT_DIRECTION_ASC => ['rating', 'asc'],
            self::SORT_DIRECTION_DESC => ['rating', 'desc'],
        ],
    ];

    private GiftPresenter $presenter;

    public function __construct(GiftPresenter $presenter) {
        $this->presenter = $presenter;
    }

    public function index(Request $request)
    {
        $request->validate([
            'sort_direction' => [
                Rule::in([ self::SORT_DIRECTION_ASC, self::SORT_DIRECTION_DESC ]),
            ],
            'sort_by' => [
                Rule::in([ self::SORT_BY_NEWEST, self::SORT_BY_RATING ]),
            ]
        ]);
        $orderBy = $request->sort_by ?? self::SORT_BY_NEWEST;
        $orderDirection = $request->sort_direction ?? self::SORT_DIRECTION_DESC;
        $limit = intval($request->limit);

        $orderConfiguration = self::SORT_CONFIGURATION_MAP[$orderBy][$orderDirection];

        $gifts = Gift::query()
            ->orderBy($orderConfiguration[0], $orderConfiguration[1])
            ->simplePaginate($limit);

        return [
            'gifts' => collect($gifts->items())->map(fn($gift) => $this->presenter->transform($gift)),
            'pagination' => [
                'limit' => $gifts->perPage(),
                'page' => $gifts->currentPage(),
                'has_more' => $gifts->hasMorePages(),
            ]
        ];
    }

    public function show(Gift $gift)
    {
        return [
            'gift' => $this->presenter->transform($gift),
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|min:1',
            'price' => 'numeric|min:1',
            'qty' => 'numeric|min:1',
            'description' => 'string|min:1',
        ]);

        $gift = Gift::create($validated);

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

    public function destroy(Gift $gift)
    {
        $gift->delete();
        return [
            'gift' => $this->presenter->transform($gift),
        ];
    }
}
