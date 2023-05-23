<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //
    public function index(\App\Models\User $user)
    {
        //$user = User::findOrFail($user);
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;

        if ($user == null || $user->profile == null){
            $user = User::findOrFail(auth()->id());
        }

        return view('profiles.home', compact('user', 'follows'));
    }

    public function edit(\App\Models\User $user)
    {
        //$user = User::findOrFail($user);
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile);
        $sata = \request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ['required', 'image'],
        ]);

        // dd($sata);
        $user->profile()->update($sata);

        if(request('image')){
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);

            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile()->update(array_merge(
            $sata,
            $imageArray ?? []

        ));
//        auth()->user()->profile->update(array_merge(
//            [
//                'image' => $imagePath,
//            ]
//        ));

        return redirect("/profile/{$user->id}");
    }
}
