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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Tim</a></li>
                <li class="breadcrumb-item" aria-current="page">Detail Data Tim</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Detail Data Tim</h2>
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
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Detail Data Tim</h5>
              <div>
                <a href="{{ route('tim.edit', $tim->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('tim.index') }}" class="btn btn-light">Kembali</a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  @if ($tim->gambar)
                    <img src="{{ asset('storage/tim/' . $tim->gambar) }}" alt="Gambar {{ $tim->nama }}" class="img-fluid rounded mb-3">
                  @else
                    <div class="bg-light rounded p-5 text-center mb-3">
                      <i class="fa fa-user" style="font-size: 5rem;"></i>
                    </div>
                  @endif
                </div>
                <div class="col-md-8">
                  <table class="table">
                    <tr>
                      <th style="width: 200px;">Nama</th>
                      <td>{{ $tim->nama }}</td>
                    </tr>
                    <tr>
                      <th>Posisi</th>
                      <td>{{ $tim->posisi }}</td>
                    </tr>
                    <tr>
                      <th>Quote</th>
                      <td>{{ $tim->quote }}</td>
                    </tr>
                    <tr>
                      <th>Sosial Media</th>
                      <td>
                        <div class="d-flex gap-2">
                          <a href="{{ $tim->instagram }}" target="_blank" class="btn btn-sm btn-danger">
                            <i class="fab fa-instagram"></i> Instagram
                          </a>
                          <a href="{{ $tim->linkedin }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fab fa-linkedin"></i> LinkedIn
                          </a>
                          <a href="{{ $tim->facebook }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fab fa-facebook"></i> Facebook
                          </a>
                          <a href="https://wa.me/{{ $tim->whatsapp }}" target="_blank" class="btn btn-sm btn-success">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                          </a>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection