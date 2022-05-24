<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller {
    public function create() {
        return view('auth/login');
    }

    public function store() {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Incorrect email or password' 
            ]);
        }

        return redirect()->to('/');
    }

    public function destroy() {
        auth()->logout();

        return redirect()->to('/login');
    }
}
