<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('access-permission-product');
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.index', compact('categories','brands', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('access-permission-product');
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.addproduct', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('access-permission-product');
        $new_product = new Product();
        $new_product->nama = $request->name;
        $new_product->harga = $request->harga;
        $new_product->deskripsi = $request->description;
        $new_product->stok = $request->stock;
        $new_product->tahun_rilis = $request->releaseyear;
        $new_product->category_id = $request->category_id;
        $new_product->brand_id = $request->brand_id;
        // $new_product->foto = $request->image;
        $new_product->foto = 11;
        $new_product->save();

        for ($i=1; $i < 9; $i++) { 
            DB::table('product_specification')->insert([
                'product_id' => $new_product->id,
                'specification_id' => $i
            ]);
        }

        return redirect('products/'.$new_product->id.'/edit')->with('status', 'Successfully add product data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $this->authorize('access-permission-product');
        return view('product.showdetail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('access-permission-product');
        //
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.editspecification', compact('categories','brands','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('access-permission-product');
        //
        $product = Product::find($id);
        $product->nama = $request->get('name');
        $product->harga = $request->get('harga');
        $product->stok = $request->get('stock');
        $product->category_id = $request->get('category_id');
        $product->deskripsi = $request->get('description');
        $product->tahun_rilis = $request->get('releaseyear');
        $product->foto = "11";
        $product->brand_id = $request->get('brand_id');
        $product->save();
        return redirect()->route('products.index')->with('status','Data successfully changed');
    }

    public function update2(Request $request, $id)
    {
        $this->authorize('access-permission-product');
        //
        $product = Product::find($id);
        $s = $product->specifications;
        foreach ($product->specifications as $s) {
            $s->pivot->keterangan = $request->get($s->nama);
            $s->pivot->save();
        }
        return redirect()->route('products.index')->with('status','Product Specification has been changed.');
        //$product->save();
        //return redirect()->route('products.index')->with('status','Data Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('access-permission-product');
        $product->delete();
        return redirect()->route('products.index')->with('status','Successfully deleted');
    }

    public function getEditFormOnly(Request $request)
    {
        $this->authorize('access-permission-product');
        $id = $request->get('id');
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return response()->json(array(
            'msg'=> view('product.editform',compact('product','brands','categories'))->render()
        ),200);
    }

    public function front_index()
    {
        $products = Product::all();
        return view('frontend.product', compact('products'));
    }

    public function cart()
    {
        $this->authorize('cart-permission-product');
        return view('frontend.cart');
    }

    public function addToCart($id)
    {
        $this->authorize('cart-permission-product');
        $product = Product::find($id);
        if(!$product)
        {
            abort('404');
        }

        $cart = session()->get('cart');
        if(!isset($cart[$id])) 
        {
            $cart[$id] = [
                'name' => $product->nama,
                'quantity' => 1,
                'price' => $product->harga,
                'photo' => $product->image
            ];
        }
        else 
        {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
