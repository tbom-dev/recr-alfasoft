@extends('template')

<div class="d-flex justify-content-center">
    <div class="card">
        <div class="card-header text-center">
            Contact
        </div>
        <div class="card-body">
            <div class="text-end">
                <a class="btn btn-sm btn-dark" href="{{ route('contact.index') }}">Home</a>
            </div>
            <h5 class="card-title border-bottom text-center">Create</h5>
            
           <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    
                </div>
                
                <div class="mb-3">
                    <label for="contact" class="form-label">Contato</label>
                    <input type="text" class="form-control" name="contact" id="contact" value="{{ old('contact') }}">
                    
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="card-footer text-body-secondary">
            
        </div>
        
    </div>

</div>