<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function create(){
        $items = Items::orderBy('id', 'desc')->get();                                                                                                                                                                                                                                           
        return view('items.index', compact('items'));
    }

    public function save(Request $request){
        try {

            $request->validate([
                'nombre' => 'required'
            ]);

            $items = new Items();
            $items->nombre = $request->post('nombre');
            $items->estado = 'activo';
            $items->save();

            return back()->with('message_true', 'Items creado correctamente');
        
        } catch (\Throwable $th) {
            return back()->with('message_false', 'Error al crear el items');
        }
    }
}
