<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryProductRequest;
use Illuminate\Http\Request;
use App\Models\Category_product;
// use Cviebrock\EloquentSluggable\Services\SlugService;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardCategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Category_product::orderBy('created_at', 'desc')->latest();
        if (request('search')) {
            $search->where('nama_category', 'like', '%' . request('search') . '%');
        }
        return view('pages.admin.category.index', [
            'title'         => 'Admin | Dashboard Category',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Data Category',
            'datacategories'  => $search->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create', [
            'title'         => 'Admin | Dashboard Add Category',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Data Add Category',
            // 'dataproducts'  => $search->paginate(20)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryProductRequest $request)
    {
        $data = $request->all();
        Category_product::create($data);
        return redirect('/dashboard/category')->with('success', 'Data Category Product berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.category.edit', [
            'title'         => 'Admin | Dashboard Edit Category',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Data Edit Category',
            'datacategori'  => Category_product::where('slug', $id)->first()
        ]);
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
        $validasidata = $request->validate([
            'nama_category'         => 'required|max:255',
            'slug'                  => 'required'
        ]);
        Category_product::where('id', $id)->update($validasidata);
        return redirect('/dashboard/category')->with('success', 'Data Category berhasil di perbaharui.!');
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
        $slug = SlugService::createSlug(Category_product::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
