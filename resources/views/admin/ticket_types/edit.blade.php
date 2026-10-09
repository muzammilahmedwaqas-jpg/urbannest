@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold py-3">Edit Ticket Type</div>
            <div class="card-body">
                <form action="{{ route('admin.ticket-types.update', $ticketType) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Associated Event</label>
                        <select name="event_id" class="form-select" required>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}" {{ old('event_id', $ticketType->event_id) == $event->id ? 'selected' : '' }}>
                                    {{ $event->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ticket Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $ticketType->name) }}" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Price (PKR)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $ticketType->price) }}" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Capacity</label>
                            <input type="number" name="capacity" class="form-control" value="{{ old('capacity', $ticketType->capacity) }}" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.ticket-types.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Update Ticket Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection