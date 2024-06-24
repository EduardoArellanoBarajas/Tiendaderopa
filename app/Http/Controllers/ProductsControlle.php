<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Producto;
use App\Models\categorie;
use Illuminate\Support\Arr;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Input;
use Illuminate\Support\Facades\Log;


class ProductsControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostrar todos los registrsos de la tabla
        $vs_product = Producto::where('stock', '>', 0)->get();
        
        $product = $this->cargarDT($vs_product);
        return view('TiendaRopa.index')->with('product', $product);

    }

    public function cargarDT($consulta)
    {
        $productos = [];
        foreach ($consulta as $key => $value) {
            // Aquí defines las URLs para las acciones
            $eliminar = route('deleteProducto', $value->id);
            $actualizar = route('TiendaRopa.edit', $value->id);
            
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

                $imagenes = '';
        $imageArray = json_decode($value->images);
        if (is_array($imageArray)) {
            foreach ($imageArray as $image) {
                $imagenes .= '<img src="' . asset('storage/' . $image) . '" alt="Imagen del Producto" width="100">';
            }
        }
    
            // Llenar el array $productos con los datos del producto
            $productos[$key] = [
                $acciones,
                $value->id,
                $value->name,
                $value->description,
                $value->price,
                $value->category ? $value->category->name : '',
                $value->stock,
                $imagenes,

                
            ];
        }
    
        return $productos;
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Abrir formularia para caotura un nuevo registro
        $categories = categorie::all();
        return view('TiendaRopa.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarada el registro capturado en un formularo de angular 

        $this->validate($request,[
            'name' => 'required|min:5',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' 

                ]);

        $product= new Producto();

    $product ->name=$request->input('name');
    $product ->description=$request->input('description');
    $product->price=$request->input('price');
    $product->category_id=$request->input('category_id');
    $product->stock=$request->input('stock');
     $images = [];
     if ($request->hasFile('images')) {
         foreach ($request->file('images') as $image) {
             $filename = $image->getClientOriginalName();
             $path = $image->storeAs('images/productos', $filename, 'public');
             $images[] = $path;
         }
     }
 
     // Convertir el array de rutas a formato JSON (o almacenar como texto, según tu elección)
     $product->images = json_encode($images); // O $product->images = implode(',', $images);
 

    $product->save();
    return redirect()->route('TiendaRopa.index')->with(array(
        'message'=>'la tienta esta guardada '
    ));


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Muetra un regitro en espesifico 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Abre le formulario para editar un registro
          // Obtener el producto y las categorías
    $Products = Producto::findOrFail($id);
    $categories = categorie::all();

    // Pasar el producto y las categorías a la vista
    return view('TiendaRopa.edit', compact('Products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validar la solicitud
    $this->validate($request, [
        'name' => 'required|min:5',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'stock' => 'required|integer',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Obtener el producto
    $product = Producto::findOrFail($id);

    // Actualizar los campos del producto
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->category_id = $request->input('category_id');
    $product->stock = $request->input('stock');

    // Logging después de actualizar los campos del producto
    Log::info('Product data updated', ['product' => $product]);

    // Obtener las imágenes actuales
    $images = json_decode($product->images, true) ?? [];

    // Remover imágenes si se seleccionaron para eliminación
    if ($request->has('removed_images')) {
        $removedImages = $request->input('removed_images');
        $images = array_diff($images, $removedImages);

        foreach ($removedImages as $removedImage) {
            Storage::disk('public')->delete($removedImage);
        }
    }

    // Añadir nuevas imágenes si se cargaron
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images/productos', $filename, 'public');
            $images[] = $path;
        }
    }

    // Logging después de procesar las imágenes
    Log::info('Images after processing', ['images' => $images]);

    // Convertir el array de rutas a formato JSON y guardarlo
    $product->images = json_encode(array_values($images));

    // Guardar el producto
    $product->save();

    // Redirigir con mensaje de éxito
    return redirect()->route('TiendaRopa.index')->with(array(
        'message' => 'La TiendaRopa se ha actualizado correctamente'
    ));
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Borra un registro
    }


    public function deleteProducto($id){
        $product = Producto::find($id);
        if($product){
            $product->stock = 0;
            $product->update();
            return redirect()->route('TiendaRopa.index')->with(array(
                "message" => "La se ha eliminado correctamente"));
        }else{
            return redirect()->route('TiendaRopa.index')->with(array(
                "message" => "La que trata de eliminar no existe"));
        } //Fin del IF
     
     
     }
     
}
