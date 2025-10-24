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
                            <li class="breadcrumb-item"><a href="/dashboard-asisten">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('layanan.index') }}">Layanan</a></li>
                            <li class="breadcrumb-item" aria-current="page">Detail Layanan</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Detail Layanan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bx bx-cog me-2"></i>Detail Layanan
                        </h5>
                        <div>
                            <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-primary">
                                <i class="bx bx-edit me-1"></i> Edit
                            </a>
                            <a href="{{ route('layanan.index') }}" class="btn btn-light">
                                <i class="bx bx-arrow-back me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Gambar Layanan -->
                            <div class="col-lg-4 col-md-5 mb-4">
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        @if($layanan->gambar)
                                            <img src="{{ asset('storage/layanan/' . $layanan->gambar) }}" 
                                                 alt="{{ $layanan->judul }}"
                                                 class="img-fluid rounded shadow-lg" 
                                                 style="max-width: 100%; height: 300px; object-fit: cover; border: 3px solid #e9ecef;">
                                        @else
                                            <div class="bg-light rounded shadow-lg d-flex align-items-center justify-content-center" 
                                                 style="width: 100%; height: 300px; border: 3px solid #e9ecef;">
                                                <div class="text-center">
                                                    <i class="bx bx-image text-muted" style="font-size: 4rem;"></i>
                                                    <p class="text-muted mt-2 mb-0">Tidak ada gambar</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="position-absolute top-0 end-0 m-2">
                                            <span class="badge bg-success">
                                                <i class="bx bx-check-circle me-1"></i>Aktif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Informasi Layanan -->
                            <div class="col-lg-8 col-md-7">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="text-primary mb-3">{{ $layanan->judul }}</h3>
                                        
                                        <!-- Slug -->
                                        <div class="mb-3">
                                            <small class="text-muted">
                                                <i class="bx bx-link me-1"></i>Slug: 
                                                <code class="bg-light px-2 py-1 rounded">{{ $layanan->slug }}</code>
                                            </small>
                                        </div>

                                        <!-- Deskripsi -->
                                        <div class="mb-4">
                                            <h6 class="text-dark mb-2">
                                                <i class="bx bx-file-text me-2"></i>Deskripsi Layanan
                                            </h6>
                                            <div class="border rounded p-3 bg-light">
                                                {!! $layanan->deskripsi !!}
                                            </div>
                                        </div>

                                        <!-- Informasi Tanggal -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card border-0 bg-light">
                                                    <div class="card-body p-3">
                                                        <h6 class="card-title text-muted mb-2">
                                                            <i class="bx bx-calendar-plus me-2"></i>Tanggal Dibuat
                                                        </h6>
                                                        <p class="card-text mb-0 fw-semibold">
                                                            {{ $layanan->created_at->format('d F Y') }}
                                                        </p>
                                                        <small class="text-muted">
                                                            {{ $layanan->created_at->format('H:i') }} WIB
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card border-0 bg-light">
                                                    <div class="card-body p-3">
                                                        <h6 class="card-title text-muted mb-2">
                                                            <i class="bx bx-calendar-edit me-2"></i>Terakhir Diperbarui
                                                        </h6>
                                                        <p class="card-text mb-0 fw-semibold">
                                                            {{ $layanan->updated_at->format('d F Y') }}
                                                        </p>
                                                        <small class="text-muted">
                                                            {{ $layanan->updated_at->format('H:i') }} WIB
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
@endsection