<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('contacts.index');
    }

    public function edit()
    {
        return view('contacts.edit');
    }

    public function create()
    {
        return view('contacts.create');
    }
}
