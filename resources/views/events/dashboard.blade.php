@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md10 offset-md-1-dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1dashboard-events-container">
    @if(count($events) > 0)

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>

                    </th>
                </tr>
            </thead>
       

        <tbody>
            @foreach($events as $events)
            <tr>
                <td scropt="row">{{$loop->index +1 }}</td>
                <td><a href="/events/{{ $events->id }}">{{$events->title }}</a>
                <td>0</td>  
                <td><a href="#">Editar</a><a href="#">Deletar</a></td>

            </tr>
        </table>
            @endforeach

    
    @else
    <p>Voce ainda não tem um evento, <a href="/events/create">Criar evento</a></p>

    @endif   

</div>
@endsection