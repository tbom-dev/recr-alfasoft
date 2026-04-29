@extends('template')

<div class="d-flex justify-content-center">
    <div class="card text-center">
        <div class="card-header">
            Contact
        </div>
        <div class="card-body">
            <div class="text-end">
                @auth
                    <a class="btn btn-sm btn-secondary" href="{{ route('login.logout') }}">Logout</a>
                @endauth
                @guest
                    <a class="btn btn-sm btn-info" href="{{ route('login.view') }}">Login</a>
                @endguest                
                <a class="btn btn-sm btn-dark" href="{{ route('contact.create') }}">+ Novo</a>
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
                                <a href="{{ route('contact.show', ['contact' => $c->id]) }}" class="btn btn-sm btn-outline-primary">View</a>
                                <a href="{{ route('contact.edit', ['contact' => $c->id]) }}" class="btn btn-sm btn-outline-warning">Edit</a>

                                {{-- <form action="{{ route('contact.destroy', $c->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form> --}}

                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                    data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal" 
                                        data-url="{{ route('contact.destroy', $c->id) }}">
                                    Delete
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

<div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete the data?</p>
            </div>
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var url = button.getAttribute('data-url');
        var formModal = document.getElementById('deleteForm');
        formModal.setAttribute('action', url);
    });
</script>