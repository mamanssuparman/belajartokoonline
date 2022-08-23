<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery_product;
use Illuminate\Support\Facades\File;
use App\Http\Requests\GalleryProductRequest;

class DashboardGalleryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('files');
        if ($request->hasFile('files')) {
            // foreach ($files as $file) {
            $filenameWithExtension      = $request->file('files')->getClientOriginalExtension();
            $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension                  = $files->getClientOriginalExtension();
            $filenamesimpan             = 'gallery' . time() . '.' . $extension;
            $files->move('gallery', $filenamesimpan);
            Gallery_product::create([
                'products_id'       => $request->products_id,
                'url'               => $filenamesimpan,
                'is_featured'       => 0
            ]);
            // }
        }
        return redirect('/dashboard/product/' . $request->products_id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Gallery_product::where('id', $id)->delete();
        $filegambar = public_path('gallery/'.$request->picture);
        File::delete($filegambar);
        return redirect('/dashboard/product/' . $request->products_id);
    }
}
