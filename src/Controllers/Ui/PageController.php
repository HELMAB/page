<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function getPage($type)
    {
        $page = Page::where([
            'type' => $type,
            'active' => true,
        ])->first();

        if (!($page instanceof Page)) {
            return abort(404);
        }

        return view('page', compact('page'));
    }
}
