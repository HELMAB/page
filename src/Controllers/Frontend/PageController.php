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
            return message_error([
                'message_en' => 'Page was not found',
                'message_km' => 'Page was not found',
            ]);
        }

        return message_success($page);
    }
}
