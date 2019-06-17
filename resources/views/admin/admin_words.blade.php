@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/text_arrange.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="justify-content-between ftable">
        <h1 class="text-center">{{ $category->category }}</h1>
        <a class="bottom" href="{{ route('add_word_admin',['id'=>$category->id]) }}">Add new word</a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Japanese</th>
                    <th scope="col">Explanation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($words as $word)
                <tr>
                    <th scope="row">{{ $word->japanese }}</th>
                    <td>{{ $word->explain }}</td>
                    <td>
                        <a class="btn btn-primary " href="{{ route('edit_word_admin',['word_id' => $word->id]) }}" role="button">
                            <small>Edit</small>
                        </a>
                        <a class="btn btn-primary " href="{{ route('delete_word_admin',['word_id' => $word->id]) }}" role="button">
                            <small>Delete</small>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection