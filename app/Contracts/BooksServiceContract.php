<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface BooksServiceContract
{
    public function get(?string $needle): Builder;

    public function getTopBooks(): Collection;
}
