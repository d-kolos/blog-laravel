<?php

namespace App\Enums;

enum PostStatusEnum: int
{
    case UNPUBLISHED = 1;
    case PUBLISHED = 2;
    case ARCHIVED = 3;

    public function name(): string
    {
        return match ($this) {
            self::UNPUBLISHED => 'Unpublished',
            self::PUBLISHED => 'Published',
            self::ARCHIVED => 'Archived',
        };
    }

    public function class(): string
    {
        return match ($this) {
            self::UNPUBLISHED => 'btn-secondary',
            self::PUBLISHED => 'btn-success',
            self::ARCHIVED => 'btn-dark',
        };
    }

}
