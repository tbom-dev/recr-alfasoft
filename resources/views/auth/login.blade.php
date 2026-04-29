@extends('template')

<div class="d-flex justify-content-center">
    <div class="card">
        <div class="card-header text-center">
            Login
        </div>
        <div class="card-body">
            <div class="text-end">
                <a class="btn btn-sm btn-primary" href="{{ route('contact.index') }}">Home</a>
            </div>

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
            <h5 class="card-title border-bottom text-center">Fazer Login</h5>
           
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="admin@admin.com">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="123456">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
                 
        </div>

        <div class="card-footer text-body-secondary">
            
        </div>
        
    </div>

</div>