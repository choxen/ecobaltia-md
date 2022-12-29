<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookHistoryRecord extends Model
{
    use HasFactory;

    public const STATUS_TAKEN = "taken";

    protected $table = "book_history_records";

    protected $fillable = [
        'book_id',
        'status',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
