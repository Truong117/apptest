<?php

namespace App\Http\Controllers;
use App\Models\trisster;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $trisster = trisster::orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            $trisster = $trisster->where('content', 'like', '%' . request()->get('search') . '%');
        }

        return view('dashboard', [
            'trissters' => $trisster->paginate(5),
        ]);
    }
}
