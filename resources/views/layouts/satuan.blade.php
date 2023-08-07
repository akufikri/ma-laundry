@extends('template')
@section('title')
    satuan unit
@endsection
@section('header')
    Satuan Unit
@endsection
@section('content')
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Satuan Unit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/post_satuan" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan_unit">
                            @error('satuan_unit')
                                <p>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">DESKRIPSI</label>
                            <textarea name="deskripsi" class="form-control" placeholder="Deksripsi" id="floatingTextarea2"
                                style="height: 100px; resize: none"></textarea>
                            @error('deskripsi')
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <section>
        <div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Satuan Unit
                            <div style="float: right"><a href="" class="btn btn-primary rounded-0">Refresh</a>
                                <button type="button" class="btn btn-default rounded-0" data-toggle="modal"
                                    data-target="#modal-default" class="btn btn-default"><i class="fa-solid fa-plus"></i>
                                    CREATE</button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table text-center table-bordered table-striped">
                                <thead class="bg-warning">
                                    <tr class="text-white">
                                        <th>NO</th>
                                        <th>SATUAN UNIT</th>
                                        <th>DESKRIPSI</th>
                                        <th>AKTIF</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($satuan as $item)
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>{{ $item->satuan_unit }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                @if ($item->status == 'aktif')
                                                    <span class="badge bg-success"> <i class="fas fa-check-circle"></i>
                                                        Aktif</span>
                                                @else
                                                    <span class="badge bg-danger"> <i class="fas fa-times-circle"></i>
                                                        Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>

                                                @if ($item->status == 'aktif')
                                                    <a class="" href="nonaktif/{{ $item->id }}">
                                                        <button class="btn btn-danger rounded-0">
                                                            <i class="fas fa-times-circle"></i>
                                                        </button>
                                                    </a>
                                                @else
                                                    <a class="" href="aktif/{{ $item->id }}">
                                                        <button class="btn btn-success rounded-0">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                                <a href="/show_satuan/{{ $item->id }}"
                                                    class="btn btn-primary rounded-0"><i
                                                        class="fa-solid fa-circle-info"></i></a>
                                                <a onclick="return confirm('Yakin hapus PERMANENT? {{ $item->satuan_unit }}')"
                                                    href="/satuan/delete/{{ $item->id }}"
                                                    class="btn btn-danger rounded-0"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>SATUAN UNIT</th>
                                        <th>DESKRIPSI</th>
                                        <th>AKTIF</th>
                                        <th>ACTION</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
