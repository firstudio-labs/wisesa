@extends('template_admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard-superadmin">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Sub Layanan</a></li>
                                <li class="breadcrumb-item" aria-current="page">Form Tambah Data Sub Layanan</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Form Tambah Data Sub Layanan</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Form Tambah Data Sub Layanan</h5>
                        </div>
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('sub-layanan.store') }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="form-label">Layanan <span class="text-danger">*</span></label>
                                    <select name="layanan_id" class="form-control @error('layanan_id') is-invalid @enderror"
                                        required>
                                        <option value="">Pilih Layanan</option>
                                        @foreach ($layanans as $layanan)
                                            <option value="{{ $layanan->id }}"
                                                {{ old('layanan_id', request('layanan_id')) == $layanan->id ? 'selected' : '' }}>
                                                {{ $layanan->judul }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('layanan_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Judul Sub Layanan <span class="text-danger">*</span></label>
                                    <input type="text" name="judul"
                                        class="form-control @error('judul') is-invalid @enderror"
                                        value="{{ old('judul') }}" placeholder="Masukkan judul sub layanan" required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5"
                                        placeholder="Masukkan deskripsi sub layanan">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <a href="{{ route('sub-layanan.index') }}" class="btn btn-light">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
