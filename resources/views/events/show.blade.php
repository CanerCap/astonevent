@extends('layouts.app')

@section('content')
<a href="/events" class="btn btn-default">Return</a>
    <h1>{{$event->name}}</h1>
<img src="{{$event->pic}}" alt="Event Pic" style="height:30%; width: 30%;">
    <div>
        <h5 style="font-weight: bold;">Description:</h5>
        <h6>{!!$event->description!!}</h6>
    </div>
    <h5 style="font-weight: bold;">Date:</h5>
    <h6>{{$event->date}}</h6>
    <h5 style="font-weight: bold;">Organiser:</h5>
    <h6>{{$event->organiser}}</h6>
    <h5 style="font-weight: bold;">Venue:</h5>
    <h6>{{$event->venue}}</h6>
    <h5 style="font-weight: bold;">Type:</h5>
    <h6>{{$event->type}}</h6>


    @if(!Auth::guest())
        @if(Auth::user()->id == $event->user_id)
<a href="/events/{{$event -> id}}/edit/" class="btn btn-success">Edit</a>
        {!!Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif
    @endif

@endsection
