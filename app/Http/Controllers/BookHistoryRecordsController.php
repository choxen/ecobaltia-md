<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookHistoryRecord;
use Illuminate\Http\RedirectResponse;

class BookHistoryRecordsController extends Controller
{
    public function markAsTaken(Book $book): RedirectResponse
    {
        BookHistoryRecord::create([
            'book_id' => $book->id,
            'status' => BookHistoryRecord::STATUS_TAKEN,
        ]);

        return redirect()->back();
    }
}
