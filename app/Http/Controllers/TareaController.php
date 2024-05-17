<?php
namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller {
    public function index() {
        $tareas = Auth::user()->tareas;
        return view('tareas.index', compact('tareas'));
    }

    public function store(Request $request) {
        $request->validate(['descripcion' => 'required']);
        Auth::user()->tareas()->create($request->all());
        return redirect()->route('tareas.index');
    }

    public function edit(Tarea $tarea) {
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea) {
        $request->validate(['descripcion' => 'required']);
        $tarea->update($request->all());
        return redirect()->route('tareas.index');
    }

    public function destroy(Tarea $tarea) {
        $tarea->delete();
        return redirect()->route('tareas.index');
    }

    public function toggle(Tarea $tarea) {
        $tarea->update(['completed' => !$tarea->completed]);
        return redirect()->route('tareas.index');
    }
}