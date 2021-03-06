<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProfileController extends Controller
{

    public function storeImage(Request $request)
    {
        if (User::find(Auth::user()->id)->profile == null) {
            Profile::create(['user_id' => Auth::user()->id]);
        }

        $profile = User::find(Auth::user()->id)->profile;

        if ($request->has('delete')) {
            $data['defaultImage'] = '';
            $profile->update($data);
            session()->flash('defaultImage', 'Your default image was removed');
        } else {
            if (strlen($_FILES['defaultImage']['name']) > 0) {
                $path = $request->file('defaultImage')->store('/songs/images', 'public');
                $data['defaultImage'] = $path;
                $profile->update($data);
                session()->flash('defaultImage', 'Your default image was set');
            }
        }

        return redirect()->route('profile');
    }
}
