@extends('layouts.admin.kerangka')
@section('content')
    {{-- Pesan Notifikasi --}}
    @if (session()->has('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div id="header-atas" class="mb-3">
        <a href="/dashboard/product/create" class="btn btn-outline-primary btn-md">
            <li class="fa fa-plus"></li>Tambah Product
        </a>
    </div>
    <form class="d-flex" action="/dashboard/product">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"
            value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit"> Search</button>
    </form>
    <table class="table table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Product</th>
                <th>Harga</th>
                <th>Category</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tr>
            @foreach ($dataproducts as $products)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $products->name }}</td>
            <td>Rp. {{ number_format($products->price, 0, ',', ',') }}</td>
            <td>{{ $products->categories->nama_category }}</td>
            <td>
                <a href="/dashboard/product/{{ $products->slug }}/edit" class="btn btn-primary btn-sm" title="Edit Product">
                    <li class="fa fa-edit"></li>
                </a>
                <a href="/dashboard/product/{{ $products->id }}" class="btn btn-primary btn-sm" title="Detail Data Product">
                    <li class="fa fa-list"></li>
                </a>
            </td>
        </tr>
        @endforeach
        </tr>
    </table>
    <div class="container">
        <div class="d-flex">
            {!! $dataproducts->links() !!}
        </div>
    </div>
@endsection
