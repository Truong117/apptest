@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.leftside_bar')
        </div>

        <div class="col-6">
            @include('shared.success_mess')
            <div class="mt-3">
                @include('shared.user_card')
            </div>
            <hr>
            @forelse ($trissters as $trisster)
                <div class="mt-3">
                    @include('trissters.shared.trisster_card')
                </div>
            @empty
                <p class="text-center mt-4" style="font-size: 30px";>No reults found. </p>
            @endforelse
            </hr>
            <div class="mt-3">
                {{ $trissters->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
