@extends('layouts.app')

@section('css')
<link href="{{ asset('css/lesson.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
            <div class="card p-4">
                <div class="card-bady">
                    <h3><strong>{{ $word->japanese }}</strong></h3>
                    <div class="dropdown-divider py-1"></div>

                    @foreach($options as $option)
                    <a href="{{ route('lesson_answer',['lesson_id' => $lesson->id, 'index' => $index, 'option_id' => $option->id]) }}">
                        <div class="answer">
                            {{ $option->option_name }}
                        </div>
                    </a>
                    @endforeach

                    <div class="hidden_box">
                        <input type="checkbox" id="label1" />
                        <label for="label1">See Word Explanation</label>
                        <div class="hidden_show">

                            <p>{{ $word->explain }}</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
@endsection