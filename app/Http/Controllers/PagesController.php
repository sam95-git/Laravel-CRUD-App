<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        //passing values into blade template(view)
        $title = 'Welcome to my first laravel project';
        //passing single value to view using compact
        return view('pages.index', compact('title'));
    }

    public function about(){
        $title = 'About us';
        //passing single value to view using with
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        //passing multiple values
        $data = array(
            'title' => 'OUR SERVICES',
            'services' => ['web dev', 'data science', 'marketing']
        );
        return view('pages.services')->with($data);
    }
}
