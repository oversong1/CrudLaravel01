<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        //Forma 01
        // $product = Product::get();
        // return view('products.index', ['products' => $product]);
        
        // Forma 02
        return view('products.index', 
            ['products' => Product::get()
        ]);
    }
    
    public function create(){
        return view('products.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        
        //Upload imagem
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        
        $product = new Product();
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Created !!!!');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit', ['product' => $product]);
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
            //Upload imagem
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        // return back()->withSuccess('Product Atualizado !!!!');
        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id){
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted !!!!');
    }
}
