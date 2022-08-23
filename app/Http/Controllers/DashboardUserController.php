<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = User::orderBy('name', 'desc')->latest();
        if (request('search')) {
            $search->where('name', 'like', '%' . request('search') . '%');
        }
        return view('pages.admin.user.index', [
            'title'             => 'Admin | Dashboard User',
            'breadcrumb1'       => 'Dashboard',
            'breadcrumb2'       => 'Data User',
            'datausers'         => $search->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create', [
            'title'             => 'Admin | Dashboard User',
            'breadcrumb1'       => 'Dashboard',
            'breadcrumb2'       => 'Add User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        User::create($data);
        return redirect('/dashboard/user')->with('success', 'Data User ' . $request->name . ' berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.admin.user.show', [
            'title'             => 'Admin | Dashboard User',
            'breadcrumb1'       => 'Dashboard',
            'breadcrumb2'       => 'Detail User',
            'datauser'          => User::where('id', $id)->first()
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
        return view('pages.admin.user.edit', [
            'title'             => 'Admin | Dashboard User',
            'breadcrumb1'       => 'Dashboard',
            'breadcrumb2'       => 'Edit User',
            'datauser'          => User::where('id', $id)->first()
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
            'name'          => 'required|max:255',
            'email'         => 'required',
            'roles'         => 'required|in:ADMIN,USER'
        ]);
        User::where('id', $id)->update($validasidata);
        return redirect('/dashboard/user')->with('success', 'Data berhasil di perbaharui.');
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
}
