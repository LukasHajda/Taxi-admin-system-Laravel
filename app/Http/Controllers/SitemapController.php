<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{

    public function render(){
        $content = view('layout.sitemap');

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

}
