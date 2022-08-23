@extends('layouts.admin.kerangka')
@section('content')
    {{-- Pesan Notifikasi --}}
    @if (session()->has('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div id="header-atas" class="mb-3">
        <a href="/dashboard/user/create" class="btn btn-outline-primary btn-md">
            <li class="fa fa-plus"></li>Tambah Users
        </a>
    </div>
    <form class="d-flex" action="/dashboard/user">
        <input class="form-control me-2" type="search" placeholder="Search User" aria-label="Search" name="search"
            value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit"> Search</button>
    </form>
    <table class="table table-hover" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            @foreach ($datausers as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles }}</td>
                <td>
                    <a href="/dashboard/user/{{ $user->id }}" class="btn btn-primary btn-sm" id="btn-detail">
                        <li class="fa fa-list"></li>
                    </a>
                    <form action="/dashboard/user/reset" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button class="btn btn-warning btn-sm" type="submit" onclick="return confirm('Apakah anda akan mereset password untuk user tersebut.!?')" title="Reset Password"><li class="fa fa-recycle"></li></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </thead>
    </table>
    <div class="container">
        <div class="d-flex">
            {{-- {!! $dataproducts->links() !!} --}}
        </div>
    </div>
@endsection
