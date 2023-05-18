@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="col-md-10 mx-auto text-center my-3 offset-md-1-dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 mx-auto offset-md-1-dashboard-events-container">
    @if(count($events) > 0)
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scropt="row">
                            {{ $loop->index +1 }} - ID: {{ $event->id }}
                        </td>
                        <td>
                            <a href="/events/{{ $event->id }}" class="btn btn-sm btn-secondary shadow">
                                {{$event->title }}
                            </a>
                        </td>

                        <td>
                            {{ count($event->users) }}

                        </td>  
                        <td>
                            <a href="/events/edit/{{ $event->id}}" class="btn btn-sm shadow btn-info edit-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg> Editar
                            </a>

                            <form action="events/{ $event->id}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm shadow btn-danger delete-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                    </svg> Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Voce ainda não tem um evento, <a href="/events/create">Criar evento</a></p>
    @endif

</div>
<div class="col-md-10 mx-auto text-center my-3 offset-md-1-dashboard-title-container">

    <h1>Eventos que estou participando</h1>

</div>
<div class="col-md-10 mx-auto offset-md-1-dashboard-events-container">

    @if(count($eventsasparticipant) > 0)

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventsasparticipant as $event)
                <tr>
                    <td scropt="row">
                        {{ $loop->index +1 }} - ID: {{ $event->id }}
                    </td>
                    <td>
                        <a href="/events/{{ $event->id }}" class="btn btn-sm btn-secondary shadow">
                            {{$event->title }}
                        </a>
                    </td>
                    <td>
                        {{ count($event->users) }}
                    </td>  
                    <td>
                    <a href="#"
                    class="btn btn-sm shadow btn-info edit-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                      </svg> Sair do evento</a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <p>Você ainda não está partcipando de nenhum evento, <a href="/" >veja todos os eventos</a></p>
    @endif
</div>
@endsection