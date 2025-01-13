<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLanguage($locale)
    {
        if (in_array($locale, ['en', 'th'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }
}
