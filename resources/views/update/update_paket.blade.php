@extends('template')
@section('title')
    Update Paket
@endsection
@section('header')
    Update Paket
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/update_paket/{{ $paket->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label>Satuan</label>
                                    <select class="form-control" aria-label="Default select example" name="pake_kuota">
                                        <option value="{{ $paket->pake_kuota }}">{{ $paket->pake_kuota }}</option>
                                        @if ($paket->pake_kuota == 'PAKET SETRIKA')
                                            <option value="PAKET LAUNDRY">PAKET LAUNDRY</option>
                                        @elseif ($paket->pake_kuota == 'PAKET SABUN')
                                            <option value="PAKET SETRIKA">PAKET SETRIKA</option>
                                        @elseif ($paket->pake_kuota == 'PAKET LAUNDRY')
                                            <option value="PAKET SABUN">PAKET SABUN</option>
                                        @else
                                            <option value="PAKET SETRIKA">PAKET SETRIKA</option>
                                            <option value="PAKET SABUN">PAKET SABUN</option>
                                        @endif
                                    </select>
                                    @error('pake_kuota')
                                        <p>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>BERAT</label>
                                    <input type="number" class="form-control" name="berat" value="{{ $paket->berat }}">
                                    @error('berat')
                                        <p>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>SATUAN</label>
                                    <select class="form-control" aria-label="Default select example" name="satuan_id">
                                        <option value="{{ $paket->satuan_id }}">{{ $paket->satuan->satuan_unit }}</option>
                                        @foreach ($satuan as $item)
                                            <option value="{{ $item->id }}">{{ $item->satuan_unit }}</option>
                                        @endforeach
                                    </select>
                                    @error('satuan_id')
                                        <p>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>HARGA(Rp)</label>
                                    <input type="number" class="form-control" value="{{ $paket->harga }}" name="harga">
                                    @error('harga')
                                        <p>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>CABANG</label>
                                    <input type="text" value="{{ $paket->cabang }}" class="form-control" name="cabang">
                                    @error('cabang')
                                        <p>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <!-- /.card-body -->

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
