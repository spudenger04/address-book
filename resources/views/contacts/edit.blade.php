<!-- resources/views/contacts/edit.blade.php -->

@extends('layout.app')

@section('content')
<h1>Edit Contact</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('contacts.update', $contact->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Contact</button>
</form>
@endsection
