@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sports List</h1>
    <ul>
        @foreach($sports as $sport)
        <li>{{ $sport->name }}</li>
        @endforeach
    </ul>
</div>
@endsection