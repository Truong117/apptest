@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.leftside_bar')
        </div>
        <div class="col-6">
            @include('shared.success_mess')
            <hr>
            <div class="mt-3">
                @include('trissters.shared.trisster_card')
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
