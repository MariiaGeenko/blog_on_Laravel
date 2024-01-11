<?php

declare(strict_types=1);

namespace App\Enums;

enum NewsStatus: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case BLOCKED = 'blocked';

    static public function all(): array
    {
        return [
            self::DRAFT->value => 'draft',
            self::ACTIVE->value => 'active',
            self::BLOCKED->value => 'blocked',
        ];
    }
}
