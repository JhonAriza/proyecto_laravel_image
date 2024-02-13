@extends('layouts.app')
@section('content')
<a href="{{route('note.index')}}">Back</a>
<h6>{{$note->id}}</h6>
<h1>{{$note->nombre}}</h1>
<td><img src="{{ asset('storage').'/'.$note->image }}" width="200px" height="200px"></td>

@endsection