@extends('template')
@section('title')
    Paket Laundry
@endsection
@section('header')
    Paket Laundry
@endsection
@section('content')
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Paket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/post_paket" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Satuan</label>
                            <select class="form-control" aria-label="Default select example" name="pake_kuota">
                                <option selected>SELECT PAKET</option>
                                <option value="PAKET SETRIKA">PAKET SETRIKA</option>
                                <option value="PAKET SABUN">PAKET SABUN</option>
                                <option value="PAKET LAUNDRY">PAKET LAUNDRY</option>
                            </select>
                            @error('pake_kuota')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>BERAT</label>
                            <input type="number" class="form-control" name="berat">
                            @error('berat')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>SATUAN</label>
                            <select class="form-control" aria-label="Default select example" name="satuan_id">
                                <option selected>SELECT SATUAN</option>
                                @foreach ($satuan as $item)
                                    <option value="{{ $item->id }}">{{ $item->satuan_unit }}</option>
                                @endforeach
                            </select>
                            @error('satuan_id')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>HARGA(Rp)</label>
                            <input type="number" class="form-control" name="harga">
                            @error('harga')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>CABANG</label>
                            <input type="text" class="form-control" name="cabang">
                            @error('cabang')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- /.card-body -->

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default rounded-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-0">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <section>
        <div>
            <div class="card rounded-0">
                <div class="card-header">
                    <form action="filter" method="GET">
                        <div class="row">
                            <div class="col-md-2 ">
                                <label for="">From</label>
                                <input type="date" class="form-control rounded-0 text-muted" name="start_date">
                                @error('created_at')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="">To</label>
                                <input type="date" class="form-control rounded-0" name="end_date">
                                @error('updated_at')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-2" style="margin-top: 2rem">
                                <button type="submit" class="btn btn-default rounded-0"><i class="fa-solid fa-filter"></i>
                                    Filter</button>
                            </div>
                            <div class="col-md-6" style="margin-top: 2rem">
                                <a href="/paket" class="btn btn-primary rounded-0" style="width: 200px">Refresh</a>
                                <button type="button" data-toggle="modal" data-target="#modal-default"
                                    class="btn btn-default rounded-0" style="width: 200px"><i class="fa-solid fa-plus"></i>
                                    CREATE</button>
                            </div>
                    </form>
                </div>
                <div class="card-body">
                    <table id="paket" class="table text-center table-bordered table-striped">
                        <thead class="bg-warning">
                            <tr class="text-white">
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
                            @foreach ($paket as $item)
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
                                        @if ($item->status == 'aktif')
                                            <a class="" href="nonaktif_paket/{{ $item->id }}">
                                                <button class="btn btn-danger rounded-0">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            </a>
                                        @else
                                            <a class="" href="aktif_paket/{{ $item->id }}">
                                                <button class="btn btn-success rounded-0">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </a>
                                        @endif
                                        <a href="/show_paket/{{ $item->id }}" class="btn btn-primary rounded-0"><i
                                                class="fa-solid fa-circle-info"></i>
                                        </a>
                                        <a href="/paket/delete/{{ $item->id }}"
                                            onclick="return confirm('YAKIN HAPUS ? {{ $item->pake_kuota }}')"
                                            class="btn btn-danger rounded-0"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
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
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
