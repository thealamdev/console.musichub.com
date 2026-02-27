<?php

namespace App\Enum;

use App\Traits\HasEnumsCollection;

enum GenreEnum: string
{
    use HasEnumsCollection;
    case INTERROGATIVE  = 'interrogative';
    case ANSWERABLE     = 'answerable';
}
