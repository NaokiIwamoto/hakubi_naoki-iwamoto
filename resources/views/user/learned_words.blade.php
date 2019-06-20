@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/text_arrange.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Japanese</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($learned_words as $word)
                <tr>
                    <th scope="row">{{ $word->learnedwordGetWord()->first()->japanese }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection