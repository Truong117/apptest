<?php

namespace App\Http\Controllers;
use App\Models\trisster;
use Illuminate\Http\Request;

class TrissterController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|max:500|min:3',
        ]);

        $validated['user_id'] = auth()->id();
        trisster::create($validated);

        return redirect()->route('dashboard')->with('success', 'Trisster created!');
    }

    public function destroy(trisster $trisster)
    {
        if(auth()->id() !== $trisster->user_id) {
            abort(404);
        }
        $trisster->delete();
        return redirect()->route('dashboard')->with('success', 'Trisster deleted!');
    }

    public function show(trisster $trisster)
    {
        return view('trissters.show', compact('trisster'));
    }

    public function edit(trisster $trisster)
    {
        if(auth()->id() !== $trisster->user_id) {
            abort(404);
        }

        $editing = true;
        return view('trissters.show', compact('trisster', 'editing'));
    }

    public function update(trisster $trisster)
    {
        if(auth()->id() !== $trisster->user_id) {
            abort(404);
        }

        $validated = request()->validate([
            'content' => 'required|max:500|min:3',
        ]);
        $trisster->update($validated);
        return redirect()
            ->route('trisster.show', $trisster->id)
            ->with('success', 'Trisster updated!');
    }
}
