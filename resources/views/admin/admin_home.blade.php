@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-sm-4">
            <div class="rounded p-4" style="background-color:white">
                <div class="body text-center">
                    <div class="py-1">
                        <img class="rounded img-thumbnail" src="" alt="account" style="width:100px; heigh:100px;">
                    </div>
                    <div class="dropdown-divider py-1"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="pb-3" href=""><strong>1</strong></a>
                            <p>following</p>
                        </div>
                        <div class="col-sm-6">
                            <a class="pb-3" href=""><strong>1</strong></a>
                            <p>followers</p>
                        </div>
                    </div>
                    <div class="dropdown-divider py-1"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div>
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <div class="card-title">
                            <h3><strong>Categorys</strong></h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection