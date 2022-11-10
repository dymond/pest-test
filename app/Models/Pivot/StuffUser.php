<?php

namespace App\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StuffUser extends Pivot
{
    public static $statuses  = [
        'WANT_THIS_STUFF' => 'Want to buy',
        'HAVE_THIS_STUFF' => 'Already own it',
    ];
}
