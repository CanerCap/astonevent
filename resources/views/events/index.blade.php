@extends('layouts.app')

@section('content')
    <h1>Events</h1>
    @if(count($events) >0)
<table class="table table-striped">
    <tr>
        <th>@sortablelink('name')</th>
        <th>@sortablelink('description')</th>
        <th>@sortablelink('date')</th>
        <th>@sortablelink('type')</th>
        <th></th>
    </tr>
    @foreach($events as $event)
    <tr>
        @if(!Auth::guest())
            <td><a href="/events/{{$event->id}}">{{$event->name}}</a></td>
        @else
            <td>{{$event->name}}</a></td>
        @endif
        <td>{!!$event->description!!}</td>
        <td>{{$event->date}}</td>
        <td>{{$event->type}}</td>
        <td> @if(!Auth::guest())
                @if(Auth::user()->id == $event->user_id)
                    {!!Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                @endif
            @if(Auth::user()->type == 'student')
            <a class="btn btn-success">Interested?</a>
            @endif
            @endif
        </td>
        </a>
    </tr>
    @endforeach

</table>

        {{$events->links()}}

    @else
        <p>No Events found</p>
    @endif
@endsection


