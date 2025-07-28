@extends('layouts')
@section('content')
    <div class="container">
        <h1>Units</h1>
        <form action="{{ route('units.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="symbol" class="form-label">Symbol</label>
                <input type="text" class="form-control" id="symbol" name="symbol" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Unit</button>
        </form>
        <a href="{{ route('units.index') }}" class="btn btn-secondary mt-3">Back to Units List</a>
    </div>
@endsection
