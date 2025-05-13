<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

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
        $user = auth()->user();
        $contacts = Contact::where('user_id',$user->id)->get(); 
        return view('contacts.index',compact('contacts'));
    }

    public function edit()
    {
        return view('contacts.edit');
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        Contact::create($request->all());
        return redirect()->route('home');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('home');

    }
}
