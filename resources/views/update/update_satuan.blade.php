@extends('template')
@section('title')
    Update Satuan
@endsection
@section('header')
    Update Satuan
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/update_satuan/{{ $satuan->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" name="satuan_unit"
                                        value="{{ $satuan->satuan_unit }}">
                                    @error('satuan_unit')
                                        <p>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1">DESKRIPSI</label>
                                    <textarea name="deskripsi" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px; resize: none">{{ $satuan->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <p>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <!-- /.card-body -->

                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
