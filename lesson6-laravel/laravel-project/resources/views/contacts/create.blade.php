@extends('layouts.app')

@section('content')
    <h1>Create New Contact</h1>
    <form action="{{ route('contact.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <button type="submit">Create</button>
    </form>
    <!--↓課題②追加-->
    <tbody>
            @foreach($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach

            @foreach($createContacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone_number }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('contact.edit',$contact) }}" class="btn btn-primary">Edit</a>
                        <!-- 削除ボタンを追加 -->
                        <form action="{{ route('contact.destroy', $contact) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    <!--↑課題②追加-->
    
@endsection