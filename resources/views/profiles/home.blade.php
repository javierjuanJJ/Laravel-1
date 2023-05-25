@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-3 p-5">
{{--            <img src="/svg/freeCodeCampLogo.svg" alt="" class="rounded-circle">--}}
            <img src="{{ $user->profile->profileImage() }}" width="100" height="100" alt="" class="rounded-circle">
        </div>
        <div class="col-9">
            <div class="col-9 pt-5 justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>

{{--                    <button class="btn btn-primary m-lg-4">Follow</button>--}}
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Add new posr</a>
                @endcan


            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
            <div class="d-flex">
                <div><strong class="pr-5">{{ $user->posts->count() }}</strong> posts</div>
                <div><strong class="pr-5">{{ $user->profile->followers->count() }}</strong> followers</div>
                <div><strong class="pr-5">{{ $user->following->count() }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a> </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)

                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{$post->image}}" alt="" class="w-100"></a>
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
