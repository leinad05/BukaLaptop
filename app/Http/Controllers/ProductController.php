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
        $file = $request->file('logo');
        $imgFolder = 'img';
        $imgFile = time() . '_' . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);

        $new_product = new Product();
        $new_product->nama = $request->name;
        $new_product->harga = $request->harga;
        $new_product->deskripsi = $request->description;
        $new_product->stok = $request->stock;
        $new_product->tahun_rilis = $request->releaseyear;
        $new_product->category_id = $request->category_id;
        $new_product->brand_id = $request->brand_id;
        $new_product->foto = $imgFile;
        $new_product->save();

        for ($i=1; $i <= 9; $i++) { 
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

    public function showDetailFrontEnd(Product $product)
    {
        return view('frontend.showdetail', ['product' => $product]);
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
        DB::table('product_specification')->where('product_id', '=', $product->id)->delete();
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
                'photo' => $product->foto
            ];
        }
        else 
        {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Product added to cart successfully!');
    }

    public function addCartDetail($id)
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
                'photo' => $product->foto
            ];
        }
        else 
        {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->route('katalog')->with('status', 'Product added to cart successfully!');
    }

    public function compareProduct(){
        $this->authorize('cart-permission-product');
        $products = Product::all();
        
        $products_spec = Product::find(1);

        $categories = Category::all();
        $brands = Brand::all();
        return view('frontend.compare', compact('categories','brands','products', 'products_spec'));
    }

    
    public function getCompareData(Request $request)
    {
        $this->authorize('cart-permission-product');
        $id = $request->get('id');
        $product = Product::find($id);
        $arrayData = array();
        $arrayProduct = array();
        $arrayProduct[0] = $product->foto;
        $harga = "Rp. " . number_format($product->harga,2,',','.');
        $arrayProduct[1] = $harga;
        foreach ($product->specifications as $s) {
            $arrayData[] = $s->pivot->keterangan;
        }
        
        return response()->json(array(
            'msg'=> 'ok', 'data' => $arrayData, 'product' => $arrayProduct),200);
    }

    public function changeImage(Request $request)
    {
        $id = $request->id;
        $file = $request->file('logo');
        $imgFolder = 'img';
        $imgFile = time() . '_' . $file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);

        $product = Product::find($id);
        $product->foto = $imgFile;
        $product->save();

        return redirect('products')->with('status', 'Successfully Edit Image');
    }
}
