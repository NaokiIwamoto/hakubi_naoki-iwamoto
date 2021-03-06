@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $category->category }}</h3>
                    <h4>Add word</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_word_admin',['id' => $category->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Japanese</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control{{ $errors->has('japanese') ? ' is-invalid' : '' }}" name="japanese" value="" required autofocus>

                                @if ($errors->has('japanese'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('japanese') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Explanation</label>

                            <div class="col-md-7">
                                <textarea name="explain" class="form-control{{ $errors->has('explain') ? ' is-invalid' : '' }}" id="" rows="10" required></textarea>

                                @if ($errors->has('explain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('explain') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-7 offset-md-3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="beginner" name="difficulty" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="beginner">Beginner</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="intermediate" name="difficulty" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="intermediate">Intermediate</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="advanced" name="difficulty" class="custom-control-input" value="3">
                                    <label class="custom-control-label" for="advanced">Advanced</label>
                                </div>
                                @if ($errors->has('difficulty'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('difficulty') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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