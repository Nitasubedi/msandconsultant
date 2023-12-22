<?php

namespace App\Http\Controllers;

use App\Article;
use App\Media;
use App\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $media = count(Media::whereIsActive(1)->get());
        $service = count(Service::whereIsActive(1)->get());
        $article = count(Article::whereIsActive(1)->get());
        return view('backend.pages.index', compact('media', 'service', 'article'));
    }
}
