@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(Auth::user()->type == 'organiser')
                    <a href ="/events/create" class="btn btn-primary">Create a New Event</a>
                    @endif
                    <h3>Your Events</h3>
                    @if(count($events) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($events as $event)
                        <tr>
                            <td><a href="/events/{{$event->id}}">{{$event->name}}</a></td>

                            <td>{{$event->date}}</td>
                            <td><a href="/events/{{$event -> id}}/edit/" class="btn btn-success">Edit</a></td>
                            <td>{!!Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach

                    </table>
                    @else
                    <p>You have no current events</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
