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
@endsection