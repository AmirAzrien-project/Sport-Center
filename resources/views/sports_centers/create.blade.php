@extends('layouts.app')

@section('content')
<h1>Create Sports Center</h1>
<form action="{{ route('sports_centers.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required>
    <button type="submit">Create</button>
</form>
@endsection