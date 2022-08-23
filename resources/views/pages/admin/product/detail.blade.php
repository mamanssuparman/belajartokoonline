@extends('layouts.admin.kerangka')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <strong>{{ $dataproduct->name }}</strong> <br>
                <small><li class="fa fa-bookmark"></li> {{ $dataproduct->categories->nama_category }}</small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                Rp. {{ number_format($dataproduct->price, 0, ',', ',') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                {{ $dataproduct->description }}
            </div>
        </div>
        <hr>
        <div class="row">
            <form action="/dashboard/galeryproduct" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 col-xs-12">
                    <small>Silahkan pilih file untuk upload file / Gambar Product</small>
                    <input type="hidden" name="products_id" value="{{ $dataproduct->id }}">
                    <input type="file" name="files" accept="image/*" class="form form-control"
                        placeholder="Upload Gallery">
                </div>
                <div class="col-md-12 col-xs-12 mt-3">
                    <button type="submit" class="btn btn-primary btn-md">
                        <li class="fa fa-upload"></li> Upload Gambar
                    </button>
                </div>
            </form>
        </div>
        <hr>
        <br>
        <table class="table table-border table-hover">
            <tr>
                <th>#</th>
                <th>Picture</th>
                <th>Aksi</th>
            </tr>
            @foreach ($datapictures as $gambars)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="/gallery/{{ $gambars->url }}" alt="" style="max-width: 200px"></td>
                    <td>
                        <form action="/dashboard/galeryproduct/{{ $gambars->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="products_id" value="{{ $gambars->products_id }}">
                            <input type="hidden" name="picture" value="{{ $gambars->url }}">
                            <button class="btn btn-danger btn-sm" type="submit"
                                onclick="return confirm('Apakah anda yakin akan menghapus gambar tersebut.!')">
                                <li class="fa fa-trash"></li>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
