<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BooksService;
use Illuminate\Http\JsonResponse;

class ApiBooksController extends Controller
{
    private BooksService $service;

    public function __construct(BooksService $service)
    {
        $this->service = $service;
    }

    public function topBooks(): JsonResponse
    {
        return response()->json([
            'top_books' => $this->service->getTopBooks()
        ]);
    }
}
