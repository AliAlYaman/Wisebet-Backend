<?php

namespace App\Enums;

enum BetEnum: string
{
    case PENDING = 'pending';
    case WON = 'won';
    case LOST = 'lost';
}
