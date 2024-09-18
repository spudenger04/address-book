<!-- resources/views/contacts/show.blade.php -->

@extends('layout.app')

@section('content')
<h1>Contact Details</h1>

<div class="card">
    <div class="card-header">
        {{ $contact->name }}
    </div>
    <div class="card-body">
        <p><strong>Phone:</strong> {{ $contact->phone }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
    </div>
</div>

<a href="{{ route('contacts.index') }}" class="btn btn-secondary mt-3">Back to Contacts</a>
@endsection
