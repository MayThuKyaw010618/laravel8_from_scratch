<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * destory user
     *
     * @return void
     */
    public function destory()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    /**
     * show login page
     */

    public function create()
    {
        return view('session.create');
    }

    /**
     * login
     */

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.',
        ]);
    }
}
