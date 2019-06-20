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
                    <h3><strong>RESULT</strong></h3>
                    <div class="dropdown-divider py-1"></div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Japanese</th>
                                <th scope="col">Correct Answer</th>
                                <th scope="col">Your Answer</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($answers as $answer)
                            <tr>
                                <th scope="row">{{ $answer->answerGetOption()->first()->optionGetWord()->first()->japanese }}</th>
                                <td>{{ $answer->answerGetOption()->first()->correct_answer }}</td>
                                <td>{{ $answer->answerGetOption()->first()->option_name }}</td>
                                @if( $answer->answerGetOption()->first()->true_or_false )
                                <td>〇</td>
                                <?php
                                $correct = 0;
                                $correct += 1;
                                ?>
                                @else
                                <td>×</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="https://twitter.com/intent/tweet?url=https://hakubi.herokuapp.com/&text='I got {{ $correct }} out of {{ count($answers) }}．Do you wanna try?'" target="blank_">
                        Share on Twiiter
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
@endsection