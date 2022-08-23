@extends('layouts.admin.kerangka')
@section('content')
    {{-- Pesan Notifikasi --}}
    @if (session()->has('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div id="header-atas" class="mb-3">
        <a href="/dashboard/category/create" class="btn btn-outline-primary btn-md">
            <li class="fa fa-plus"></li>Tambah Category
        </a>
    </div>
    <form class="d-flex" action="/dashboard/category">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"
            value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit"> Search</button>
    </form>
    <table class="table table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Category</th>
                <th>Aksi</th>
            </tr>
            @foreach ($datacategories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->nama_category }}</td>
                <td><a href="/dashboard/category/{{ $category->slug }}/edit" class="btn btn-primary btn-sm"><li class="fa fa-edit"></li></a></td>
            </tr>
            @endforeach
        </thead>

    </table>
    <div class="container">
        <div class="d-flex">
            {!! $datacategories->links() !!}
        </div>
    </div>
@endsection
