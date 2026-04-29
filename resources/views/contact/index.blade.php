@extends('template')

@section('title', 'Listing')

<div class="d-flex justify-content-center">
    <div class="card text-center">
        <div class="card-header">
            Contact
        </div>
        <div class="card-body">
            <div class="text-end">
                @php
                    $buttonDisabled = '';
                    $linkDisabled = '';
                @endphp
                @auth
                    <a class="btn btn-sm btn-secondary" href="{{ route('login.logout') }}"><i class="bi bi-box-arrow-left"></i> Logout</a>                    
                @endauth
                @guest
                    <a class="btn btn-sm btn-warning" href="{{ route('login.view') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    @php
                        $buttonDisabled = 'disabled';
                        $linkDisabled = 'disabled';
                    @endphp
                @endguest                
                <a class="btn btn-sm btn-success {{$linkDisabled}}" href="{{ route('contact.create') }}">+ Novo</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h5 class="card-title border-bottom">Listing</h5>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $c)
                        <tr>
                            <th scope="row">{{ $c->id }}</th>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->contact }}</td>
                            <td>{{ $c->email }}</td>
                            <td>
                                <a href="{{ route('contact.show', ['contact' => $c->id]) }}" class="btn btn-sm btn-outline-primary {{$linkDisabled}}"><i class="bi bi-eye"></i> View</a>
                                <a href="{{ route('contact.edit', ['contact' => $c->id]) }}" class="btn btn-sm btn-outline-warning {{$linkDisabled}}"><i class="bi bi-pencil-square"></i> Edit</a>

                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                    data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal" 
                                        data-url="{{ route('contact.destroy', $c->id) }}" {{$buttonDisabled}}>
                                    <i class="bi bi-trash3-fill"></i> Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>       

            </table>
        </div>

        <div class="card-footer text-body-secondary">
            {{ $contacts->links() }}
        </div>
        
    </div>

</div>

@include('parts.deleteModal')