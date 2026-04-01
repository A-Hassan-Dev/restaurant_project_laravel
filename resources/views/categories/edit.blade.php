@extends('layouts.admin-layout')
@section('title', 'Edit Category')

@section('content')
    <form action="{{ route('categories.update',$category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            @error('name')
                <div class="alert alert-danger m3">{{ $message }}</div>
            @enderror
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name' , $category->name) }}" class="form-control @error('title') is-invalid @enderror">
        </div>
        <button class="btn btn-success" type="submit"> Update </button>
    </form>
@endsection