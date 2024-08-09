@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.leftside_bar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Stan Trisster is a community of Twitter users that post opinions related to celebrities, music, TV shows,
                movies,
                video games, social media, and others. The community has been noted for its particular shared terminology
                but also
                for incidents of harassment and bullying. Usually, Stan Twitter revolves around discussing public figures —
                primarily those in the entertainment industry such as actors and musicians.
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
        @endsection
