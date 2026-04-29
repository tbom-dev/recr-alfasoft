@extends('template')

<div class="d-flex justify-content-center">
    <div class="card">
        <div class="card-header text-center">
            Contact
        </div>
        <div class="card-body">
            <div class="text-end">
                <a class="btn btn-sm btn-primary" href="{{ route('contact.index') }}"><i class="bi bi-house"></i> Home</a>
                <a class="btn btn-sm btn-warning" href="{{ route('contact.edit', $contact->id) }}"><i class="bi bi-pencil-square"></i> Edit</a>
                <button type="button" class="btn btn-sm btn-danger" 
                    data-bs-toggle="modal" 
                        data-bs-target="#deleteModal" 
                        data-url="{{ route('contact.destroy', $contact->id) }}">
                    <i class="bi bi-trash3-fill"></i> Delete
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h5 class="card-title border-bottom text-center">View</h5>
           
           <dl class="row">
                <dt class="col-sm-3"># ID:</dt>
                <dd class="col-sm-9">{{ $contact->id }}</dd>
                <hr> 
                <dt class="col-sm-3">Name:</dt>
                <dd class="col-sm-9">{{$contact->name}}</dd>
                <hr> 
                <dt class="col-sm-3">Contact:</dt>
                <dd class="col-sm-9">{{$contact->name}}</dd>
                <hr> 
                <dt class="col-sm-3">Email:</dt>
                <dd class="col-sm-9">{{$contact->email}}</dd>
            </dl>
                 
        </div>

        <div class="card-footer text-body-secondary">
            
        </div>
        
    </div>

</div>

@include('parts.deleteModal')