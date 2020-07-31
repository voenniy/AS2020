<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show');
    }

    public function showform()
    {
        //dd(request()->all());
        return view('profile.update', ['user' => auth()->user()]);
    }

    public function update(ProfileRequest $request)
    {
        $data = array_filter($request->all());
        if (isset($data['password'])) {
            $data['password'] = \Hash::make($data['password'] . auth()->user()->salt);
            unset($data['password_confirmation']);
        }
        $data['avatar'] = base64_encode($request->file('avatar')->get());

        auth()->user()->update($data);
        return redirect(route('user.home'));
    }
}
