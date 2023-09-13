<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCreditsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreditsController extends Controller
{
    public function add(AddCreditsRequest $request): RedirectResponse
    {
        $creditsPrice = $request->credits*env("CREDITS_VALUE_RSD");

    }
}
