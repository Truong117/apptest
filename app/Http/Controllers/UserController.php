<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {

        $trissters = $user->trissters()->paginate(5);

        return view("users.show", compact("user",'trissters'));
    }

    public function edit(User $user)
    {
        $trissters = $user->trissters()->paginate(5);

        $editing = true;
        return view("users.edit", compact("user", "editing",'trissters'));


    }

    public function update(User $user)
    {
        $validated = request()->validate([
            'name'=> 'required|min:3|max:40',
            'bio' =>'nullable|max:300',
            'image'=> 'image'
            ]);

        if(request('image')){
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);
        return redirect()->route('profile');
    }

    public function profile(){
        return $this->show(auth()->user());
    }
}
