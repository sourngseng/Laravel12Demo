{{-- View Unit --}}
@extends('layouts')
@section('title', 'View Unit')
@section('content')
    <div class="container">
        <h1>View Unit</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $unit->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="symbol" class="form-label">Symbol</label>
            <input type="text" class="form-control" id="symbol" name="symbol" value="{{ $unit->symbol }}" readonly>
        </div>
        <a href="{{ route('units.index') }}" class="btn btn-secondary mt-3">Back to Units List</a>
    </div>
@endsection
{{-- End of View Unit --}}
