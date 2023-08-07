@extends('template')
@section('title')
    Trash Paket
@endsection
@section('header')
    Trash Paket
@endsection
@section('content')
    <section>
        <div class="card rounded-0">
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>PAKET KUOTA</th>
                            <th>BERAT</th>
                            <th>HARGA</th>
                            <th>CABANG</th>
                            <th>CREATED AT</th>
                            <th>AKTIF</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($trash as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->pake_kuota }}</td>
                                <td>{{ $item->berat }} {{ $item->satuan->satuan_unit }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->cabang }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if ($item->status == 'aktif')
                                        <span class="badge bg-success rounded-pill"><i class="fas fa-check-circle"></i>
                                            Aktif</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill"><i class="fas fa-times-circle"></i>
                                            Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/paket/restore/{{ $item->id }}" class="btn btn-default rounded-0"><i
                                            class="fa-solid fa-recycle"></i> Restore</a>
                                    <a onclick="return confirm('Yakin hapus permanen ? {{ $item->pake_kuota }}')"
                                        href="/paket/permanent_del/{{ $item->id }}" class="btn btn-danger rounded-0"><i
                                            class="fa-solid fa-trash-can-arrow-up"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
