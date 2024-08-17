<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Mews\Purifier\Facades\Purifier;

$cleanedHTML = Purifier::clean($request->input('about'));


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
