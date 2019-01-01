<?php

namespace App\Http\Controllers;

use App\Repositories\Frontend\FrontendRepositoryInterface;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    protected $frontendRepository;

    public function __construct(FrontendRepositoryInterface $frontendRepository)
    {
        $this->frontendRepository = $frontendRepository;
    }

    public function getFrontend(){
        $data = $this->frontendRepository->getFrontend();
        return view('frontend.home.index', compact('data'));
    }
    public function getContact(){
        $data = $this->frontendRepository->getContact();
        return view('frontend.contact.index', compact('data'));

    }
    public function getAboutUs(){
        $data = $this->frontendRepository->getAboutUs();
        return view('frontend.about-us.index', compact('data'));
    }
    public function getBlogs(){
        $data = $this->frontendRepository->getBlogs();
        return view('frontend.blogs.index', compact('data'));
    }
    public function getServices(){
        $data = $this->frontendRepository->getServices();
        return view('frontend.services.index', compact('data'));
    }
    public function changeLanguage($language)
    {

        if (Session::has('website_language')) {
            Session::put('website_language', $language);
        }
        app()->setLocale(Session::get('website_language'));
        $array=explode('/',back()->getTargetUrl());
        $end=end($array);
        if($end=='tim-kiem'){

            return redirect()->route('homepage');
        }
        return back();
    }

}

