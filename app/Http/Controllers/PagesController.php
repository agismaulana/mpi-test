<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('home');
    }

    public function checkout() {
        return view('checkout');
    }

    public function login() {
        return view('login');
    }
}
