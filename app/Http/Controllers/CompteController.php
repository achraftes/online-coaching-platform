<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CompteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('compte.index', compact('user'));
    }
}