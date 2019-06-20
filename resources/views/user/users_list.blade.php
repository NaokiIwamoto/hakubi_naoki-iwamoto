@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <h3><strong>Users</strong></h3>
    <div class="dropdown-divider py-1"></div>

    <div class="row">
        @foreach ($users as $user)
        <div class="col-sm-6">
            <div class="list-group-item list-group-item-action mb-3 rounded">

                <div class="row">
                    <div class="col-sm-3">
                        <a href="#">
                            <img src="/images/account/{{ $user->icon }}" class="img-circle" width="100" height="100">
                        </a>
                    </div>
                    <div class="col-sm-9">
                        <div class="w-100">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-1">{{ $user->name }}</h5>
                                <small>Registrated : {{ \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at)) ->diffForHumans() }}</small>
                            </div>
                            <div class="dropdown-divider py-1"></div>
                            <div class="d-flex justify-content-between">
                                @if (auth()->user()->following()->find($user->id) !== null)
                                <a class="btn btn-secondary " href="/user/{{$user->id}}/unfollow" role="button">
                                    <small>
                                        Unfollow
                                    </small>
                                </a>
                                @else
                                <a class="btn btn-primary " href="/user/{{$user->id}}/follow" role="button">
                                    <small>
                                        Follow
                                    </small>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection