@extends('layouts.app')

@section('content')
    <a href="{{ route('note.create') }}">Crear nota nueva</a>



  
      
    
       
   




    <ul>
        <section class="flex-container">
        @forelse ($notes as $note)
            <li class="caja c1">
                <a href="{{ route('note.show', $note->id) }}">{{ $note->nombre }}</a> <a href="{{ route('note.edit', $note->id) }}">Editar</a>
                <td><img src="{{ asset('storage').'/'.$note->image }}" width="100px" height="70px"></td>
                <form method="POST" action="{{ route('note.eliminar', $note->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="X">
                </form>
            </li>
        @empty
            <p>No hay datos</p>
        @endforelse
    </section>
    </ul>
     

@endsection
<style> body {
    background-color: beige;
}

.flex-container {
    border: 1px solid rgb(red, green, blue);
    background-color: #ccc;
    padding: 20px;
    display: flex;
    flex-flow: row wrap;
    align-content: center;
    justify-content: center;
    width: 80%;
    height: 600px;
    margin: 0 auto;
}

.caja {
    border: 1px solid rgb(70, 69, 69);
    color: black;
    font-family: 'Courier New', Courier, monospace;
    font-weight: bold;
    width: 120px;
    height: 120px;
    line-height: center;
    margin: 5px;
    overflow: hidden;
    text-align: center;
}

.c1 {
    background: rgb(247, 248, 248);
}

 

/* ... y así sucesivamente */
</style>