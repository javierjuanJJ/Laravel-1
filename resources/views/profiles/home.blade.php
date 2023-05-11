@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/freeCodeCampLogo.svg" alt="" class="rounded-circle">
        </div>
        <div class="col-9">
            <div class="col-9 pt-5 justify-content-between align-items-baseline">
                <div class="h4">{{ $user->username }}</div>
                <a href="#">Add new posr</a>
                <div class="d-flex">
                    <div><strong class="pr-5">153</strong> posts</div>
                    <div><strong class="pr-5">23k</strong> followers</div>
                    <div><strong class="pr-5">212</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->caption }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a> </div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)

                <div class="col-4 pb-4">
                    <img src="/storage/{{$post->image}}" alt="" class="w-100">
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
