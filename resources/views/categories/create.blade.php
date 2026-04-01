@extends('layouts.admin-layout')
@section('title', 'Create Category')


@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            @error('name')
                <div class="alert alert-danger m3">{{ $message }}</div>
            @enderror
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('title') is-invalid @enderror">
        </div>
        <button class="btn btn-success" type="submit"> Save </button>
    </form>

@endsection