@extends('layouts.app')

@section('title', 'Contact Details - Contact Manager')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user me-2"></i>Contact Details
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">
                                <i class="fas fa-hashtag me-1"></i>ID
                            </label>
                            <p class="form-control-plaintext">{{ $contact->id }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">
                                <i class="fas fa-user me-1"></i>Name
                            </label>
                            <p class="form-control-plaintext">{{ $contact->name }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">
                                <i class="fas fa-phone me-1"></i>Phone
                            </label>
                            <p class="form-control-plaintext">{{ $contact->phone }}</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">
                                <i class="fas fa-calendar-plus me-1"></i>Created At
                            </label>
                            <p class="form-control-plaintext">{{ $contact->created_at->format('F d, Y \a\t g:i A') }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">
                                <i class="fas fa-calendar-edit me-1"></i>Updated At
                            </label>
                            <p class="form-control-plaintext">{{ $contact->updated_at->format('F d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Back to Contacts
                    </a>
                    <div>
                        <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-1"></i>Edit Contact
                        </a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-1"></i>Delete Contact
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

