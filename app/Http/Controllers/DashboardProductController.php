<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category_product;
use App\Models\Gallery_product;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Product::orderBy('created_at', 'desc')->latest();
        if(request('search')){
            $search->where('name','like', '%'. request('search').'%');
        }
        return view('pages.admin.product.index', [
            'title'         => 'Admin | Dashboard Product',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Data Product',
            'dataproducts'  => $search->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.product.create', [
            'title'         => 'Admin | Add Product',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Add Product',
            'datacategories'=> Category_product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        // Proses Simpan
        Product::create($data);
        return redirect('/dashboard/product')->with('success', 'Data product ' . $request->name . ' berhasil di simpan.!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = DB::table('gallery_products')->where('products_id',$id)->get();
        // ddd($data);
        return view('pages.admin.product.detail', [
            'title'         => 'Admin | Detail Product',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Detail Product',
            'dataproduct'   => Product::where('id', $id)->first(),
            // 'datapictures'  => DB::table('gallery_products')->where('products_id',$id)->get()
            'datapictures'  => Gallery_product::where('products_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.product.edit', [
            'title'         => 'Admin | Edit Product',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Edit Product',
            'dataproduct'   => Product::where('slug', $id)->first(),
            'datacategories'=> Category_product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = [
            'name'          => $request->name,
            'price'         => $request->price,
            'description'   => $request->description,
            'slug'          => $request->slug
        ];
        Product::where('id', $id)->update($data);
        return redirect('/dashboard/product')->with('success', 'Data product berhasil di perbaharui.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
