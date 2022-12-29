<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\SearchBookRequest;
use App\Services\BooksService;
use Illuminate\Contracts\View\View;


class BooksController extends Controller
{
    private const ITEMS_PER_PAGE = 10;
    private BooksService $service;

    public function __construct(BooksService $service)
    {
        $this->service = $service;
    }

    public function index(SearchBookRequest $request): View
    {
        $books = $this->service->get($request->search);

        return view('dashboard', [
            'books' => $books->paginate(self::ITEMS_PER_PAGE),
        ]);
    }
}
