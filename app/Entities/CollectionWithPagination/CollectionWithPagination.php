<?php

namespace App\Entities\CollectionWithPagination;

use Illuminate\Support\Collection;

class CollectionWithPagination
{
    public function __construct(
        public array $data,

        public readonly mixed $currentPage,
        public readonly mixed $nextPage,
        public readonly mixed $lastPage,
        public readonly mixed $perPage,
        public readonly mixed $total
    )
    {}
}
