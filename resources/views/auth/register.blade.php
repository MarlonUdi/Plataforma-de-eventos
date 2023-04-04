@extends('layouts.main')
@section('title', 'Cadastrar')
@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center mb-5" style="min-height: 80vh;">

            <div class="col-lg-5">
                @if(session('error'))
                    <div class="alert alert-danger border-danger shadow mx-2 alert-dismissible fade show" role="alert">
                        <p class="m-0">
                            {{ session('error') }}
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger border-danger shadow mx-2 alert-dismissible fade show" role="alert">
                        @foreach($errors->all() as $error)
                            <p class="m-0">
                                {{ $error }}
                            </p>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('auth.post') }}" class="row g-2 mx-auto">
                    @csrf

                    <div class="form-floating col-md-12">
                        <input type="text" class="form-control border-secondary shadow @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome" required>
                        <label for="name">Nome:</label>
                    </div>

                    <div class="form-floating col-md-12">
                        <input type="email" class="form-control border-secondary shadow @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required>
                        <label for="email">Email:</label>
                    </div>
    
                    <div class="form-floating col-md-12">
                        <input type="password" class="form-control border-secondary shadow @error('password') is-invalid @enderror" id="password" name="password" placeholder="Senha" required>
                        <label for="password">Senha:</label>
                    </div>
    
                    <div class="form-floating col-md-12">
                        <input type="password" class="form-control border-secondary shadow @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Senha" required>
                        <label for="password_confirmation">Confirmar Senha:</label>
                    </div>
    
                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-primary shadow w-50">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
@endsection
