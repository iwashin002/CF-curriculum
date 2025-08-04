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

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }
    //課題②で作成
    public function create()
    {
        $user = auth()->user();
        $createContacts = Contact::where('user_id', $user->id)->get();
        return view('contacts.create' , compact('createContacts'));
    }


    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);

    //課題④・⑤
    $validated = $request->validate([
        'phone_number' => 'unique:contacts,phone_number|regex:/^[0-9]+$/',
        'email' => 'unique:contacts,email',
    ],
    [
        'phone_number.regex' => '数値を入力してください',
        'phone_number.unique' => '電話番号は既に登録しています',
        'email.unique' => 'メールアドレスは既に登録しています',   
    ]);

        Contact::create($request->all());
        return redirect()->route('home');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('home');

    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('home');
    }


}
