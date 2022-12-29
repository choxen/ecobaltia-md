<?php

namespace App\Services;

use App\Contracts\BooksServiceContract;
use App\Models\Book;
use App\Models\BookHistoryRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class BooksService implements BooksServiceContract
{
    private const AMOUNT_OF_TOP_BOOKS = 10;

    public function get(?string $needle): Builder
    {
        $books = Book::where(function (Builder $query) use ($needle) {
            $query->when($needle, function (Builder $query) use ($needle) {
                $query->where('name', $needle)->orWhereHas('authors', function (Builder $query) use ($needle) {
                    $query->where('name', $needle);
                });
            });
        })->withCount([
            'historyRecords as taken_in_month' => function ($query) {
                $query->where('status', BookHistoryRecord::STATUS_TAKEN)->whereMonth('created_at', Carbon::now()->month);
            },
            'historyRecords as taken_in_total' => function ($query) {
                $query->where('status', BookHistoryRecord::STATUS_TAKEN);
            }
        ])->orderBy('taken_in_month', 'desc');

        return $books;
    }

    public function getTopBooks(): Collection
    {
        $books = Book::withCount([
            'historyRecords as taken_in_month' => function ($query) {
                $query->where('status', BookHistoryRecord::STATUS_TAKEN)->whereMonth('created_at', Carbon::now()->month);
            }
        ])->orderBy('taken_in_month', 'desc')->take(self::AMOUNT_OF_TOP_BOOKS)->get();

        return $books;
    }
}
