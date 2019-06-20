@extends('layouts.app')

@section('css')
<link href="/css/home.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
            <div class="card p-4">
                <div class="card-bady">
                    <h3><strong>Change Icon</strong></h3>
                    <div class="dropdown-divider py-1"></div>
                    <form method="POST" action="{{ route('update_icon') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- image -->
                        <div class="text-center pt-2">
                            <img src="/images/account/{{ auth()->user()->icon }}" class="img-circle" width="300" height="300">
                            <div class="custom-file mt-4">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="icon" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            </div>
                        </div>

                        <div class="text-md-center">
                            <input type="submit" class="btn btn-primary" value="Update" style="width:170px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
@endsection