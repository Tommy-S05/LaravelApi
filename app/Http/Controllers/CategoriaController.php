<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

class CategoriaController extends Controller
{
    //Obtener todo lo que está en categorias
    public function getCategoria(){
        return response()->json(categoria::all(),200);
    }

    //Obtener categoria por ID
    public function getCategoriaID($id){
        $categoria = categoria::find($id);

        if(is_null($categoria)){
            return response()->json(
                [
                    "Result" => 0,
                    "Mensaje" => "Registro no encontrado",
                    "Data" => null
                ],
                404
            );
        }
        return response()->json(
            [
                "Result" => 1,
                "Mensaje" => "Registro encontrado",
                "Data" => $categoria::find($id)
            ],
            200);
    }

    //Añadir categoria
    public function AddCategoria(Request $request){
        $categoria = categoria::create($request->all());
        return response()->json(
            [
                "Result" => 1,
                "Mensaje" => "Registro agregado",
                "Data" => $categoria
            ],
            200);
    }

    //Modificar categoria
    public function ModifyCategoria(Request $request, $id){
        $categoria = categoria::find($id);

        if(is_null($categoria)){
            return response()->json(
                [
                    "Result" => 0,
                    "Mensaje" => "Registro no encontrado",
                    "Data" => null
                ],
                404
            );
        }

        $categoria->update($request->all());
        return response()->json(
            [
                "Result" => 1,
                "Mensaje" => "Registro modificado",
                "Data" => $categoria
            ],
            200
        );
    }

    //Eliminar categoria
    public function DeleteCategoria($id){
        $categoria = categoria::find($id);

        if(is_null($categoria)){
            return response()->json(
                [
                    "Result" => 0,
                    "Mensaje" => "Registro no encontrado",
                    "Data" => null
                ],
                404
            );
        }

        //$categoria->update($request->all());
        $categoria->delete();
        return response()->json(
            [
                "Result" => 1,
                "Mensaje" => "Registro eliminado",
                "Data" => categoria::all()
            ],
            200
        );
    }
}
