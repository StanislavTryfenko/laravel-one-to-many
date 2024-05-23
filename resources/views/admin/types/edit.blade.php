@extends('layouts.admin')

@section('content')

    <div class="container">
        
        <h1>Edit: {{ $type->name }}</h1>

        <a class="btn btn-primary" href="{{ route('admin.types.index') }}">Go back</a>

        @include('partials.validation-messages')
        @include('partials.session-messages')

        <form action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Type name" value="{{ old('name', $type->name) }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for the type</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
