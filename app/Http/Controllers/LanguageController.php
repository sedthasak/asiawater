<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        // Set the language in the session
        session(['locale' => $locale]);

        // Redirect back to the previous page
        return redirect()->back();
    }
}
