@extends('layouts.app')
@section('title', @$menu ? 'Edit Menu' : 'Create Menu')
@section('content')
@if ($errors->any())
    <div class="container-fluid">
        <div class="row mt-4 mb-2 fw-bold fs-4 justify-content-center">
            <div class="col-md-10">
                <div class="alert-danger text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-2">
            <div class="ml-1">
                <a href="{{ route('menu.index') }}" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
<form action="{{ @$menu ? route('menu.update', $menu) : route('menu.store') }}" method="POST">
    @csrf
    @if (@$menu)
        @method('PUT')
    @endif
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="nama" class="form-label fw-bold">Nama Menu</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', @$menu->nama) }}">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label fw-bold">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', @$menu->harga) }}">
                </div>
                @if (@$menu)
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning">Ubah</button>
                </div>
                @else
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
                @endif
            </div>
        </div>
    </div>   
</form>
@endsection