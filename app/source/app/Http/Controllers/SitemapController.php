<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCollection;
use App\Models\PostTag;


class SitemapController extends Controller
{
    public function sitemap()
    {
        $posts = Post::where('status', 'Published')->select('slug', 'updated_at', 'created_at', 'post_collection_id')->with('collection')->get();
        $collections = PostCollection::where('status', 'Published')->select('slug', 'updated_at', 'created_at')->get();
        $tags = PostTag::where('status', 'Published')->select('slug', 'updated_at', 'created_at')->get();
        // return $collections;
        return response()->view('sitemap.sitemap', compact('posts', 'collections', 'tags'))->header('Content-Type', 'text/xml');
    }
}
