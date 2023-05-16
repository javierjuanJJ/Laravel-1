<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index(\App\Models\User $user)
    {
        //$user = User::findOrFail($user);

        if ($user->profile == null){
            $user = User::findOrFail(auth()->id());
        }

        return view('profiles.home', compact('user'));
    }

    public function edit(\App\Models\User $user)
    {
        //$user = User::findOrFail($user);
        return view('profiles.edit', compact('user'));
    }

    public function update(\App\Models\User $user)
    {
        $sata = \request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        // dd($sata);
        $user->profile()->update($sata);

        //auth()->user()->profile->update($sata);

        return redirect("/profile/{$user->id}");
    }
}
