@extends('layouts.main')
@section('title', 'Entrar')
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

                <form method="POST" action="{{ route('auth.auth') }}" class="row g-2 mx-auto">
                    @csrf

                    <div class="form-floating col-md-12">
                        <input type="email" class="form-control border-secondary shadow" id="email" name="email" placeholder="Email" required>
                        <label for="email">Email:</label>
                    </div>

                    <div class="form-floating col-md-12">
                        <input type="password" class="form-control border-secondary shadow" id="password" name="password" placeholder="Senha" required>
                        <label for="password">Senha:</label>
                    </div>

                    <div style="position: relative;" class="mb-4 mt-3">
                        <div class="form-check" style="position: absolute; left: 50%; transform: translate(-50%);">
                            <input class="form-check-input border-secondary shadow" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Manter conectado
                            </label>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-primary shadow w-50">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
@endsection