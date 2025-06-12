@extends('layouts.app')

@section('content')
    <h1>Edit Contact</h1>
    <form action="{{ route('contact.update', $contact) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $contact->name }}">
        <!-- この行に名前のinputを追加 -->
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" value="{{ $contact->phone_number }}">
        <!-- この行に電話番号のinputを追加 -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $contact->email }}">
        <!-- この行にメールアドレスのinputを追加 -->
        <button type="submit">Update</button>
    </form>
     <!--↓課題①-->   
     <form action="{{ route('contact.destroy', $contact) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <!--↓課題③-->
    @foreach($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
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
    <!--↑課題③-->
@endsection