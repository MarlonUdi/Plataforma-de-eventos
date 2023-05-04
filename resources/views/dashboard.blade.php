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
        </table>

        <tbody>
            @foreach($events as $events)
            <tr>
                <th scropt="row">{{$loop->index +1 }}</th>
                <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
            </tr>
          
            @endforeach

    
    @else
    <p>Voce ainda não tem um evento, <a href="/events/create">Criar evento</a></p>

    @endif   

@endsection