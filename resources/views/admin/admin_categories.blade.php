@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Categories</h1>
        <a href="{{ route('add_category_admin') }}">Add new category</a>
        <br>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Describe</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->category }}</th>
                    <td>{{ $category->describe }}</td>
                    <td>
                        <a class="btn btn-primary " href="#" role="button">
                            <small>Add word</small>
                        </a>
                        <a class="btn btn-primary " href="#" role="button">
                            <small>Edit</small>
                        </a>
                        <a class="btn btn-primary " href="#" role="button">
                            <small>Delete</small>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection