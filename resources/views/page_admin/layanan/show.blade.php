@extends('template_admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="fw-bold mb-1">
                            <span class="text-muted fw-light">Layanan /</span> 
                            <span class="text-primary">Detail Layanan</span>
                        </h4>
                        <p class="text-muted mb-0">Informasi lengkap tentang layanan yang dipilih</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-primary btn-sm">
                            <i class="bx bx-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('layanan.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bx bx-arrow-back me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-gradient-primary text-white">
                        <h5 class="mb-0">
                            <i class="bx bx-info-circle me-2"></i>
                            Informasi Layanan
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <!-- Judul Layanan -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bx bx-title text-primary me-2"></i>
                                <h6 class="fw-bold mb-0 text-primary">Judul Layanan</h6>
                            </div>
                            <div class="bg-light rounded p-3">
                                <h4 class="mb-0 fw-semibold">{{ $layanan->judul }}</h4>
                            </div>
                        </div>

                        <!-- Deskripsi Layanan -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bx bx-detail text-primary me-2"></i>
                                <h6 class="fw-bold mb-0 text-primary">Deskripsi Layanan</h6>
                            </div>
                            <div class="bg-light rounded p-3">
                                <div class="text-dark">{!! $layanan->deskripsi !!}</div>
                            </div>
                        </div>

                        <!-- Informasi Tambahan -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bx bx-calendar-plus text-success me-2"></i>
                                        <h6 class="fw-bold mb-0 text-success">Dibuat pada</h6>
                                    </div>
                                    <div class="bg-success bg-opacity-10 rounded p-3">
                                        <span class="fw-semibold">{{ $layanan->created_at->format('d F Y') }}</span>
                                        <small class="text-muted d-block">{{ $layanan->created_at->format('H:i') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bx bx-calendar-check text-warning me-2"></i>
                                        <h6 class="fw-bold mb-0 text-warning">Terakhir diupdate</h6>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 rounded p-3">
                                        <span class="fw-semibold">{{ $layanan->updated_at->format('d F Y') }}</span>
                                        <small class="text-muted d-block">{{ $layanan->updated_at->format('H:i') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Gambar Layanan -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-gradient-info text-white">
                        <h5 class="mb-0">
                            <i class="bx bx-image me-2"></i>
                            Gambar Layanan
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        @if($layanan->gambar)
                            <div class="text-center">
                                <img src="{{ asset('storage/layanan/' . $layanan->gambar) }}"
                                    alt="Gambar {{ $layanan->judul }}" 
                                    class="img-fluid rounded shadow-sm"
                                    style="max-height: 300px; object-fit: cover;">
                                <div class="mt-3">
                                    <small class="text-muted">
                                        <i class="bx bx-image me-1"></i>
                                        {{ $layanan->gambar }}
                                    </small>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 80px; height: 80px;">
                                    <i class="bx bx-image text-muted" style="font-size: 2.5rem;"></i>
                                </div>
                                <h6 class="text-muted mb-1">Tidak ada gambar</h6>
                                <small class="text-muted">Gambar layanan belum diupload</small>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-gradient-secondary text-white">
                        <h5 class="mb-0">
                            <i class="bx bx-cog me-2"></i>
                            Aksi Cepat
                        </h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="d-grid gap-2">
                            <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-primary">
                                <i class="bx bx-edit me-2"></i> Edit Layanan
                            </a>
                            <a href="{{ route('layanan.index') }}" class="btn btn-outline-secondary">
                                <i class="bx bx-list-ul me-2"></i> Daftar Layanan
                            </a>
                            <button type="button" class="btn btn-outline-info" onclick="window.print()">
                                <i class="bx bx-printer me-2"></i> Cetak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .bg-gradient-info {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        .bg-gradient-secondary {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            color: #333 !important;
        }
        .card {
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-2px);
        }
        .info-card {
            height: 100%;
        }
        .btn {
            transition: all 0.2s ease-in-out;
        }
        .btn:hover {
            transform: translateY(-1px);
        }
    </style>
@endsection