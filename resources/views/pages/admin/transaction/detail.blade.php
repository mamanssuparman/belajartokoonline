@extends('layouts.admin.kerangka')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <strong> Detail Transaction</strong>
                <hr>
                <table class="table table-hover">
                    <tr>
                        <td style="width: 200px">Tanggal Transaksi</td>
                        <td>: {{ $datatransaksi->created_at }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Name</td>
                        <td>: {{ $datatransaksi->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: {{ $datatransaksi->email }}</td>
                    </tr>
                    <tr>
                        <td>Addres / Alamat</td>
                        <td>: {{ $datatransaksi->address }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>: {{ $datatransaksi->phone }}</td>
                    </tr>
                    <tr>
                        <td>Courier</td>
                        <td>: {{ $datatransaksi->courier }}</td>
                    </tr>
                    <tr>
                        <td>Payment</td>
                        <td>: {{ $datatransaksi->payment }}</td>
                    </tr>
                    <tr>
                        <td>Payment URL</td>
                        <td>: {{ $datatransaksi->payment_url }}</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td>: Rp. {{ number_format($datatransaksi->total_price, 0, ',', ',') }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{ $datatransaksi->status }}</td>
                    </tr>
                </table>
                <form action="/dashboard/transaction/{{ $datatransaksi->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <select name="status" id="status" class="form form-control">
                        <option value="CANCEL">CANCEL</option>
                        <option value="PENDING">PENDING</option>
                        <option value="SUCCESS">SUCCESS</option>
                        <option value="SHIPPING">SHIPPING</option>
                        <option value="SHIPPED">SHIPPED</option>
                    </select>
                    <button class="btn btn-primary btn-md my-3 pull-right"><li class="fa fa-save"></li> UPDATE</button>
                </form>
            </div>
            <div class="col-md-6">
                <strong>Item Transaction</strong>
                <hr>
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Nama Product</th>
                        <th>Harga</th>
                    </tr>
                    @foreach ($itemtransaksis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>Rp. {{ number_format($item->product->price, 0, ',', ',') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection
