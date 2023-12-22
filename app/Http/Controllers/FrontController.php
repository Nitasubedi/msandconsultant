<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleType;
use App\Company;
use App\Contact;
use App\Media;
use App\MediaTypes;
use App\Service;
use App\testimonial;
use App\Gallery;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $mediaType = MediaTypes::where('name', 'slider')->whereIsActive(1)->first();
        if ($mediaType) {
            $slider = Media::where('media_type_id', $mediaType->id)->whereIsActive(1)->first();
        } else {
            $slider = null;
        }

        // if ($mediaType) {
        //     $id = $mediaType->id;
        // } else {
        //     $mediaType = null;
        // }

        $services = Service::whereIsActive(1)->get();


        $articleType = ArticleType::where('name', 'blog')->whereIsActive(1)->first();
        $articles = Article::where('article_type_id', $articleType->id)->whereIsActive(1)->get();

        $testimonials = testimonial::whereIsActive(1)->get();

        $currentDate = now();
        $mediaPop = MediaTypes::where('name', 'pop up')->whereIsActive(1)->first();
        if ($mediaPop) {
            $popUp = Media::where('media_type_id', $mediaPop->id)->where('expires_on', '>', $currentDate)->whereIsActive(1)->first();
        } else {
            $popUp = null;
        }

        return view('frontend.pages.index', compact('slider', 'services', 'articles', 'testimonials', 'popUp'));
    }

    public function about()
    {
        $mediaType = MediaTypes::where('name', 'about')->whereIsActive(1)->first();
        if ($mediaType) {
            $about = Media::where('media_type_id', $mediaType->id)->whereIsActive(1)->first();
        }
        $services = Service::whereIsActive(1)->get();
        $testimonials = testimonial::whereIsActive(1)->get();
        $articleType = ArticleType::where('name', 'blog')->whereIsActive(1)->first();

        $articles = Article::where('article_type_id', $articleType->id)->whereIsActive(1)->get();


        return view('frontend.pages.about', compact('about', 'services', 'testimonials', 'articles'));
    }

    public function service()
    {
        $services = Service::whereIsActive(1)->get();
        return view('frontend.pages.service', compact('services'));
    }

    public function blog()
    {
        $articleType = ArticleType::where('name', 'blog')->whereIsActive(1)->first();
        $articles = Article::where('article_type_id', $articleType->id)->whereIsActive(1)->get();
        $latest_posts = Article::where('article_type_id', $articleType->id)->whereIsActive(1)->orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.blog', compact('articles', 'latest_posts'));
    }

    public function contact()
    {
        $company = Company::first();
        return view('frontend.pages.contact', compact('company'));
    }

    public function gallery()
    {
        $gallery = Gallery::all();
        return view('frontend.pages.gallery', compact('gallery'));
    }

    public function storeContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');

        $contact->save();
        return redirect('contact');
    }
}
