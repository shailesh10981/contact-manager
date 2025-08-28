@extends('layouts.app')

@section('title', 'All Contacts - Contact Manager')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-users me-2"></i>All Contacts
                </h5>
                <div>
                    <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i>Add New Contact
                    </a>
                    <a href="{{ route('contacts.import.form') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-upload me-1"></i>Import XML
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($contacts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>
                                        <i class="fas fa-user me-2 text-muted"></i>
                                        {{ $contact->name }}
                                    </td>
                                    <td>
                                        <i class="fas fa-phone me-2 text-muted"></i>
                                        {{ $contact->phone }}
                                    </td>
                                    <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('contacts.show', $contact) }}" class="btn btn-outline-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-outline-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        {{ $contacts->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-address-book fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No contacts found</h5>
                        <p class="text-muted">Start by adding a new contact or importing from XML.</p>
                        <a href="{{ route('contacts.create') }}" class="btn btn-primary me-2">
                            <i class="fas fa-plus me-1"></i>Add First Contact
                        </a>
                        <a href="{{ route('contacts.import.form') }}" class="btn btn-success">
                            <i class="fas fa-upload me-1"></i>Import from XML
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

