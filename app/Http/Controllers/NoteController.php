<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Note;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    // este controlador recepciona un id
    public function index(): View
    {


        $notes = Note::all();
        return view('note.index', compact('notes'));
    }


    public function create(): view
    {

        $categoria['categorias'] = Categoria::paginate(10);
        return view('note.create', $categoria);
    }

    public function store(NoteRequest  $request): RedirectResponse
    {
        $notes = request()->except('_token');
        if ($request->hasfile('image')) {
            $notes['image'] = $request->file('image')->store('uploads', 'public');
        }
        Note::insert($notes);
        // Note::create($request->all());
        return redirect()->route('note.index')->with('success', 'nota creada ');
    }

    public function edit(Note $note)
    {


        $categorias = Categoria::paginate(10);
        return view('note.edit', compact('note', 'categorias'));
    }






    // public function update(NoteRequest $request,  $id): RedirectResponse
    // {
    //     $datosNote = request()->except(['_token', 'method']);
    //     if ($request->hasFile('image')) {

    //         $note = Note::findOrFail($id);
    //         Storage::delete('public/' . $note->image);
    //         $datosNote['image'] = $request->file('image')->store('uploads', 'public');
    //     }

    //     Note::where('id', '=', $id)->update($datosNote);
       
    //     return redirect()->route('note.index')->with('success', 'nota editada ');
    // }


     public function update(NoteRequest $request, $id): RedirectResponse
     {
         // Validar que la nota existe
         $note = Note::findOrFail($id);
         // Validar que se haya cargado un archivo y que sea una imagen
         if ($request->hasFile('image') && $request->file('image')->isValid()) {
             // Almacenar la imagen utilizando el método store
             $filename = $request->file('image')->store('uploads', 'public');
             $note->image = $filename;
         }
         // Actualizar la nota
         $note->update([
             'nombre' => $request->nombre,
             'categoria_id' => $request->categoria_id
         ]);
         return redirect()->route('note.index')->with('success', 'Nota editada');
     }







    public function show(Note $note): View
    {
        return view('note.show', compact('note'));
    }
    public function eliminar(Request $request, Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('note.index')->with('danger', 'nota eliminada ');;
    }
}
