@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>
{!! Form::open(['action' => ['EventsController@update', $event ->id], 'method' => 'POST']) !!}
<div class="form-group">
    {{Form::label('name','Event Name')}}
    {{Form::text('name',$event->name, [ 'class' => 'form-control', 'placeholder' => 'Event Name'])}}
</div>
<div class="form-group">
    {{Form::label('description','Description')}}
    {{Form::textarea('description',$event->description, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Event Description'])}}
</div>
<div class="form-group">
    {{Form::label('date','Date')}}
    {{Form::date('date',\Carbon\Carbon::now())}}
</div>
<div class="form-group">
    {{Form::label('pic','Picture')}}
    {{Form::text('pic',$event->pic, ['class' => 'form-control', 'placeholder' => 'Picture URL'])}}
</div>
<div class="form-group">
    {{Form::label('venue', 'Venue')}}
    {{Form::text('venue',$event->venue, ['class' => 'form-control', 'placeholder' => 'Venue Location'])}}
</div>
<div class="form-group">
    {{Form::label('type','Type of Event')}}
    {{Form::select('type', ['Sports', 'Culture', 'Other'], $event->type)}}
</div>
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection