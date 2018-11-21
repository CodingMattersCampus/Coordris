<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Listing extends Controller
{
    public function __invoke() : View
    {
        return \view('center.listing');
    }
}
