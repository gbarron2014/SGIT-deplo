<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $image_name = null;
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
        }
        $product = Product::create($request->all()+[
            'image'=>$image_name,
        ]);

        if ($request->code == "") {
            $numero = $product->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $product->update(['code'=>$numeroConCeros]);
        }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.edit', compact('product', 'categories', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $image_name = $request->input('picture');
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }

        $product->update($request->all()+[
            'image'=>$image_name,
        ]);
        if ($request->code == "") {
            $numero = $product->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $product->update(['code'=>$numeroConCeros]);
        }
        
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }


    // Cambiar el estatus de los productos 
    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status'=>'DEACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        } 
    }


    // Obtener los productos según su ID y el código de barras
    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }

     
    // Imprimir el código de barras
    public function print_barcode()
    {
        $products = Product::get();
        $pdf = \PDF::loadView('admin.product.barcode', compact('products'));
        return $pdf->download('codigos_de_barras.pdf');
    }
}
