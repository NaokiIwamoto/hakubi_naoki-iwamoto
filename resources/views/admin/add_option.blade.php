@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Add options</h4>
                </div>

                <div class="card-body">
                    <form>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Japanese</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control{{ $errors->has('japanese') ? ' is-invalid' : '' }}" value="{{ $word->japanese }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Explanation</label>

                            <div class="col-md-7">
                                <textarea　class="form-control{{ $errors->has('explain') ? ' is-invalid' : '' }}" id="" rows="10" disabled>{{ $word->explain }}</textarea>
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-7 offset-md-3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    @if($word->difficulty == 1)
                                    <input type="radio" id="beginner" class="custom-control-input" value="1" checked disabled>
                                    @else
                                    <input type="radio" id="beginner" class="custom-control-input" value="1" disabled>
                                    @endif
                                    <label class="custom-control-label" for="beginner">Beginner</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    @if($word->difficulty == 2)
                                    <input type="radio" id="intermediate" class="custom-control-input" value="2" checked disabled>
                                    @else
                                    <input type="radio" id="intermediate" class="custom-control-input" value="2" disabled>
                                    @endif
                                    <label class="custom-control-label" for="intermediate">Intermediate</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    @if($word->difficulty == 3)
                                    <input type="radio" id="intermediate" class="custom-control-input" value="3" checked disabled>
                                    @else
                                    <input type="radio" id="intermediate" class="custom-control-input" value="3" disabled>
                                    @endif
                                    <label class="custom-control-label" for="advanced">Advanced</label>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('store_option_admin',['word_id' => $word->id]) }}">

                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Option 1 (correct)</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="option1" require>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Option 2</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="option2" require>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Option 3</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="option3" require>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection