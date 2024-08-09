<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trisster;

class TrissterLikeController extends Controller
{
    public function like(trisster $trisster)
    {
        $liker = auth()->user();

        $liker->likes()->attach($trisster->id);

        return redirect()->route('dashboard')->with('success','Liked');
    }

    public function unlike(trisster $trisster)
    {
        $liker = auth()->user();

        $liker->likes()->detach($trisster->id);

        return redirect()->route('dashboard')->with('success','Unliked');

    }

}
