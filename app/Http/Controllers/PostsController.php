<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('profiles.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'caption'=>'required',
            'image'=>['required', 'image'],
        ]);

        auth()->user()->posts()->create($data);

        Post::create($data);


        dd(request()->all());
    }
}
