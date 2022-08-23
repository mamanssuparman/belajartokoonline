@extends('layouts.admin.kerangka')
@section('content')
    {{-- Pesan Notifikasi --}}
    @if (session()->has('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover" id="example">
        <tr>
            <th>#</th>
            <th>Tanggal Transaksi</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Kurir</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($datatransactions as $transaksi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaksi->created_at }}</td>
                <td>{{ $transaksi->name }}</td>
                <td>{{ $transaksi->phone }}</td>
                <td>{{ $transaksi->courier }}</td>
                <td>Rp. {{ number_format($transaksi->total_price, 0, ',', ',') }}</td>
                <td>
                    @if ($transaksi->status == 'PENDING' || $transaksi->status == 'CANCEL')
                        <span class="badge bg-danger"> {{ $transaksi->status }}</span>
                    @else
                        <span class="badge bg-success"> {{ $transaksi->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="/dashboard/transaction/{{ $transaksi->id }}" class="btn btn-primary btn-sm"
                        title="Detail Transaksi">
                        <li class="fa fa-list"></li>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
