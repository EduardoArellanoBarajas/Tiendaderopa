<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        $categories = $this->cargarDT($categories);
        return view('categories.index', compact('categories'));
    
    
    }

    public function cargarDT($consulta)
    {
        $categories = [];
        foreach ($consulta as $key => $value) {
            // Aquí defines las URLs para las acciones
            $eliminar = route('deleteCategoria', $value->id);
            $actualizar = route('categories.edit', $value->id);
            
            // Aquí defines las acciones HTML
            $acciones = '
                <div class="btn-acciones">
                    <div class="btn-circle">
                        <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                            <i class="far fa-edit"></i>
                        </a>
                        <a role="button" class="btn btn-danger" onclick="modal('.$value->id.')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                </div>';

               
    
            // Llenar el array $productos con los datos del producto
            $categories[$key] = [
                $acciones,
                $value->id,
                $value->name,
            
        
                
            ];
        }
    
        return $categories;
    }
    


    public function create()
    {

        return view('categories.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   
        $this->validate($request,[
            'name' => 'required|min:5',
       

                ]);

        $categories= new categorie();

    $categories ->name=$request->input('name');

    $categories->save();
    return redirect()->route('categories.index')->with(array(
        'message'=>'Se GUARDO CORRECTAMENTE'
    ));


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categorie::findOrFail($id);
        return view('categories.edit', compact('categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $categories = Categorie::findOrFail($id);
        $categories->name = $request->input('name');
        $categories->save();

        return redirect()->route('categories.index')->with(array(
            'message'=>'SE ACTUALIZO CORRECTAMENTE'
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function deletecategoria($id){
        $categories = Categorie::findOrFail($id);
        $categories->delete();

        return redirect()->route('categories.index')->with(array(
            'message'=>'SE ELIMINO CORRECTAMENTE'
        ));
     }
}
