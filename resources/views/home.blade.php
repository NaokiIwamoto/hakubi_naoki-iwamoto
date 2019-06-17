@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container pt-4 mt-4">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <a href="{{ route('edit_profile')}}" class="link">
                            <img src="/images/account.png" class="img-circle" width="150">
                            <h3 class="card-title m-t-10">{{ auth()->user()->name }}</h4>
                        </a>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4">
                                <a href="javascript:void(0)" class="link">
                                    <i class="fa fa-user"></i><br>
                                    <font class="font-medium">???</font><br>
                                    <small class="text-muted p-t-30 db">Following</small>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0)" class="link">
                                    <i class="fa fa-image"></i><br>
                                    <font class="font-medium">???</font><br>
                                    <small class="text-muted p-t-30 db">Follower</small>
                                </a>
                            </div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body text-center">
                    <small class="text-muted">Email address</small>
                    <h6>{{ auth()->user()->email }}</h6>
                    <small class="text-muted p-t-30 db">Registrate</small>
                    <h6>+91 654 784 547</h6>
                    <small class="text-muted p-t-30 db">Leaned word</small>
                    <h6>???</h6>
                    <small class="text-muted p-t-30 db">Social Profile</small>
                    <br>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="ribbon12-wrappe card-body">
                    <h1 class=" text-center">Lesson Category</h1>
                    @foreach ($categories as $category)
                    <div class="container pt-4 category-card">
                        <div>
                            <h3 class="category-titel"><span class="category">{{ $category->category }}</span></h3>
                        </div>
                        <div class="dropdown-divider divider py-1"></div>
                        <div>
                            <p>{{ $category->describe }}</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <a href="#" class="btn-circle-stitch-beginner">
                                    Beginner
                                </a>
                            </div>
                            <div class="col-sm-4 text-center">
                                <a class="btn-circle-stitch-intermidiate" href="#">
                                    Intermidiate
                                </a>
                            </div>
                            <div class="col-sm-4 text-center">
                                <a class="btn-circle-stitch-advance" href="#">
                                    Advance
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection