<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(Request $request) {
        return view('home');
    }

    public function checkout(Request $request) {
        return view('checkout');
    }

    public function login(Request $request) {
        return view('login');
    }

    public function waiting(Request $request) {
        return view('waiting');
    }

    public function transaction(Request $request) {
        return view('transaction');
    }
}
