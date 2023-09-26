<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        session()->put('locale', $request->lang);
        app()->setLocale($request->lang);

        return redirect()->back();
    }
}
