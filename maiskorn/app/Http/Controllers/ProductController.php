<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // get user's id
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $user = User::where('id', Auth::id())->get();

        // $chunk = $products->chunk(5);

        $products = Product::oldest()->paginate(5);
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // photo
        $photo = $request->file('photo');

        if($request->hasFile('photo')){
            $filenameWithExt = $photo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $image = $filename.'_'.time().'.'.$extension;
            $path = $photo->storeAs('public/img', $image);

        }else{
            $image = 'default.png';
        }

        // 
        $product = new Product();
        $product->fill($request->all());
        $product->photo = $image;
        $product->user_id = Auth::id();
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->update($request->all());
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // get photo
        // $photo = $product->photo;

        
        // if($photo){
        //     Storage::delete('/img/'.$photo);
        // }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product Deleted!');
    }
}
