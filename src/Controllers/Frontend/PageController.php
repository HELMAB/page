<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

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

        return message_success($page);
    }
}
