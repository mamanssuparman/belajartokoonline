@extends('layouts.admin.kerangka')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a href="/dashboard/profile/{{ $datauser->id }}/edit" class="btn btn-warning btn-md">
                    <li class="fa fa-edit"></li>PERBAHARUI DATA
                </a>
                <a href="/dashboard/profile/{{ $datauser->id }}/edit" class="btn btn-warning btn-md">
                    <li class="fa fa-edit"></li>Ubah Password
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                Nama
            </div>
            <div class="col-md-6">
                : {{ $datauser->name }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                Email
            </div>
            <div class="col-md-6">
                : {{ $datauser->email }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                ROLE
            </div>
            <div class="col-md-6">
                : {{ $datauser->roles }}
            </div>
        </div>
    </div>
@endsection
