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
                <li class="breadcrumb-item" aria-current="page">Tabel Data Tim</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Tabel Data Tim</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- Zero config table start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Tabel Data Tim</h5>
                <a href="{{ route('tim.create') }}" class="btn btn-primary">Tambah Data Tim</a>
            </div>
            <div class="card-body">
              @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <div class="dt-responsive table-responsive">
                <table id="simpletable" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Nama</th>
                      <th>Posisi</th>
                      <th>Quote</th>
                      <th>Sosial Media</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tim as $e => $t)
                    <tr>
                      <td>{{ $e+1 }}</td>
                      <td>
                        @if ($t->gambar)
                          <img src="{{ asset('upload/tim/' . $t->gambar) }}" alt="Gambar {{ $t->nama }}" class="img-thumbnail" style="max-height: 100px; width: auto;">
                        @else
                          <div class="bg-light rounded p-2">
                                <i class="fa fa-user" style="font-size: 2rem;"></i>
                          </div>
                        @endif
                      </td>
                      <td>{{ $t->nama }}</td>
                      <td>{{ $t->posisi }}</td>
                      <td>{!! Str::limit($t->quote, 50) !!}</td>
                      <td>
                        <div class="d-flex gap-2">
                          <a href="{{ $t->instagram }}" target="_blank" class="btn btn-sm btn-danger">
                            <i class="fab fa-instagram"></i>
                          </a>  
                          <a href="{{ $t->linkedin }}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fab fa-linkedin"></i>
                          </a>
                          <a href="{{ $t->facebook }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fab fa-facebook"></i>
                          </a>
                          <a href="https://wa.me/{{ $t->whatsapp }}" target="_blank" class="btn btn-sm btn-success">
                            <i class="fab fa-whatsapp"></i>
                          </a>
                        </div>
                      </td>
                      <td>
                        <a href="{{ route('tim.show', $t->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('tim.edit', $t->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tim.destroy', $t->id) }}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Nama</th>
                      <th>Posisi</th>
                      <th>Quote</th>
                      <th>Sosial Media</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Zero config table end -->
      </div>
    </div>
  </section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
  <script>
    $(document).ready(function() {
      $('#simpletable').DataTable();
    });
  </script>
  @endsection