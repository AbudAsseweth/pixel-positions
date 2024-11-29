<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Tag $tag)
    {
        $jobs = $tag->jobs->load(['employer', 'tags']);
        return view("result", compact("jobs"));
    }
}
