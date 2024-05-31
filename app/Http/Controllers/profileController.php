<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class profileController extends Controller
{

    public function showProfile()
    {
        $timezones = timezone_identifiers_list();

       return view('profile', ['timezones'=>$timezones]);
    }

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'timezone' => ['required', 'timezone'],
    ]);

    Auth::user()->update($validatedData);

    return redirect()->back()->with('success', 'User updated successfully.');


    }
}