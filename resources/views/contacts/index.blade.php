@extends('layout.app')

@section('content')
@if (session()->has('deleted'))
    <div class="alert alert-danger">
        {{ session()->get('deleted') }}
    </div><br>
@endif
@if (session()->has('updated'))
    <div class="alert alert-info">
        {{ session()->get('updated') }}
    </div><br>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br>
@endif
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Contact <b>Details</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{ route('contacts.create') }}" class="btn btn-info add-new">
                            <i class="fa fa-plus"></i> Add New Contact
                        </a>
                    </div><br>
                </div>
            </div>

            @if($contacts->isEmpty())
                <p class="text-center">No contacts available.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-success btn-sm" title="Show">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

</div>
@endsection
