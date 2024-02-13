@extends('layouts.app')
@section('content')
<a href="{{ route('note.index') }}">Back </a>
<form method="POST" action="{{ route('note.update',$note->id ) }}"  enctype="multipart/form-data">

    {{-- @method('PUT') --}}
    @csrf
     
        @method('PATCH')
    <label  >nombre:</label>
    <input type="text" name="nombre"  value="{{ $note->nombre }}"/>
    @error('nombre')
    <p style="color:red">{{$message}}</p>
    
    @enderror
    <input class="form-control" type="file" name="image" id="image" required>
    @if(isset($note->image))
    <img src="{{ asset('storage').'/'.$note->image }}" width="100px" height="70px">
    @endif
 
   

    <div class='mb4'>
        <select class="form-control" name="categoria_id" required>
            <option value="">Selelecionar proceso</option>
            @foreach ($categorias as $item)
            <option value="{{ $item->id }}">
                {{ $item->nombre}}
            </option>
            @endforeach
        </select>
    </div>




    <input type="submit" value="Update">
</form>
@endsection