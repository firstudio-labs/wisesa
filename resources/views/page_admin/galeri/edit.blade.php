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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Galeri</a></li>
                <li class="breadcrumb-item" aria-current="page">Form Edit Data Galeri</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Form Edit Data Galeri</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row justify-content-center">
        <!-- [ form-element ] start -->
        <div class="col-sm-6">
          <!-- Basic Inputs -->
          <div class="card">
            <div class="card-header">
              <h5>Form Edit Data Galeri</h5>
            </div>
            <div class="card-body">
              @if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label class="form-label">Keterangan</label>
                  <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan', $galeri->keterangan) }}" required>
                  @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="form-label">Kategori Gambar</label>
                  <select name="kategori_gambar_id" class="form-control @error('kategori_gambar_id') is-invalid @enderror" required>
                    <option value="">Pilih Kategori Gambar</option>
                    @foreach ($kategoriGambars as $kategoriGambar)
                      <option value="{{ $kategoriGambar->id }}" {{ old('kategori_gambar_id', $galeri->kategori_gambar_id) == $kategoriGambar->id ? 'selected' : '' }}>
                        {{ $kategoriGambar->kategori_gambar }}
                      </option>
                    @endforeach
                  </select>
                  @error('kategori_gambar_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="form-label">Gambar</label>
                  <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                  <small class="text-muted">Format: jpeg, png, jpg, gif, svg. Maksimal 7MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                  @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  @if ($galeri->gambar)
                    <div class="mt-2">
                      <label class="form-label">Gambar Saat Ini</label>
                      <img src="{{ asset('storage/galeri/' . $galeri->gambar) }}" alt="Gambar {{ $galeri->keterangan }}" class="img-thumbnail" style="max-height: 200px;">
                    </div>
                  @endif
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                  <button type="reset" class="btn btn-light">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

