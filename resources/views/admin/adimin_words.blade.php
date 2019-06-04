@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3>{{ $category->category }}</h3>
        <br>
        <a href="{{ route('add_word_admin') }}">Add new word</a>

        @foreach ($words as $word)
        <div class="list-group-item list-group-item-action mb-3 rounded">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-1">{{ $admin->name }}</h5>
                    <a class="btn btn-primary " href="{{route('home')}}" role="button">
                        <small>Edit word
                    </a>
                </div>
                <div class="dropdown-divider py-1"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection