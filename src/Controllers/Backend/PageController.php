<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    public function show(Request $request)
    {
        $this->validate($request, [
            'page_uuid' => 'required|uuid',
        ]);

        try {
            $page = Page::where(['uuid' => $request->page_uuid])->first();
            if (!($page instanceof Page)) {
                return message_error([
                    'message_en' => "The page not found",
                    'message_km' => "ទំព័រនេះរកមិនឃើញទេ",
                ]);
            }
            return message_success($page);
        } catch (\Exception $e) {
            return server_error($e);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_km' => 'required',
            'title_en' => 'required',
            'type' => 'required',
            'content_km' => 'required',
            'content_en' => 'required',
        ]);

        try {
            $page = null;

            switch ($request->type) {
                case config('page.types.privacy-policy'):
                case config('page.types.terms-and-conditions'):
                    break;
                default:
                    return message_error([
                        'message_en' => 'Unknown type of page.',
                        'message_km' => 'មិនអាចសំគាល់ប្រភេទទំព័រទេ។',
                    ]);
                    break;
            }

            if (isset($request->page_uuid)) {
                $page = Page::where(['uuid' => $request->page_uuid])->first();
                if (!($page instanceof Page)) {
                    return message_error([
                        'message_en' => "The page not found",
                        'message_km' => "ទំព័រនេះរកមិនឃើញទេ",
                    ]);
                }
                $page->update($request->all());
            } else {
                $page = Page::create($request->all());
            }
            return message_success($page);
        } catch (\Exception $e) {
            return server_error($e);
        }
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'page_uuid' => 'required|uuid',
        ]);

        try {
            $page = Page::where(['uuid' => $request->page_uuid])->first();
            if (!($page instanceof Page)) {
                return message_error([
                    'message_en' => "The page not found",
                    'message_km' => "ទំព័រនេះរកមិនឃើញទេ",
                ]);
            }
            $page->delete();
            return message_success($page);
        } catch (\Exception $e) {
            return server_error($e);
        }
    }

    public function toggle(Request $request)
    {
        $this->validate($request, [
            'page_uuid' => 'required|uuid',
            'type' => 'required'
        ]);

        try {
            switch ($request->type) {
                case config('page.types.privacy-policy'):
                case config('page.types.terms-and-conditions'):
                    break;
                default:
                    return message_error([
                        'message_en' => 'Unknown type of page.',
                        'message_km' => 'មិនអាចសំគាល់ប្រភេទទំព័រទេ។',
                    ]);
                    break;
            }
            $page = Page::where(['uuid' => $request->page_uuid])->first();
            if (!($page instanceof Page)) {
                return message_error([
                    'message_en' => "The page not found",
                    'message_km' => "ទំព័រនេះរកមិនឃើញទេ",
                ]);
            }
            if (!$request->active) {
                Page::where([
                    'type' => $request->type,
                    'active' => true
                ])->update([
                    'active' => false
                ]);
            }
            $page->update([
                'active' => !$page->active
            ]);
            return message_success($page);
        } catch (\Exception $e) {
            return server_error($e);
        }
    }

    public function datatable(Request $request)
    {
        $pages = Page::when(isset($request->type), function ($query) use ($request) {
            $query->where(['type' => $request->type]);
        })->select('pages.*');

        return DataTables::of($pages)->make(true);
    }
}
