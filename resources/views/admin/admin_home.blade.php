@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/home.css">
@endsection

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-4">
            <div class="rounded p-4" style="background-color:white">
                <div class="body text-center">
                    <div class="py-1">
                        <img class="rounded img-thumbnail account" src="/images/account/account.png" alt="account">
                    </div>
                    <h4 class="py-3">{{ auth()->user()->name }}</h4>
                    <div class="dropdown-divider py-1"></div>
                    <div class="card-body">
                        <div class="card-title">
                            <a href="{{ route('open_category_admin') }}">
                                <h3><strong>Category</strong></h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div>
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <div class="card-title">
                            <h3><strong>Admin Users</strong></h3>
                        </div>
                        <a href="{{ route('admin_add') }}">Add admin user</a>
                        @foreach ($admins as $admin)
                        <div class="list-group-item list-group-item-action mb-3 rounded">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img class="rounded img-thumbnail  account" src="/images/account/account.png" alt=" account">
                                </div>
                                <div class="col-sm-9">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-1">{{ $admin->name }}</h5>
                                            <small>Registrated : {{ \Carbon\Carbon::createFromTimeStamp(strtotime($admin->created_at)) ->diffForHumans() }}</small>
                                        </div>
                                        <div class="dropdown-divider py-1"></div>
                                        <a class="btn btn-primary " href="#" role="button">
                                            <small>Remove admin</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection