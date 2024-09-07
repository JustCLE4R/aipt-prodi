@extends('layouts.main')

@section('content')

<section class="section-padding" style="margin-top: 9vh;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">{{ $title }}</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  
  <div class="row justify-content-center mt-3 wow fadeInDown">
    <div class="col-6">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {!! session('success') !!}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {!! session('error') !!}
        </div>
        @endif
    </div>
  </div>

<script>
  setTimeout(function() {
      $('.alert').fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
  }, 5000);
</script>

  <div class="container border rounded shadow p-4" style="width:90%;">
    <div class="row justify-content-between pb-4">
      <div class="col-lg-4 col-md-6 col-sm-12 mb-2 mb-md-0">
        <a href="/admin/visualisasi"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
        <a href="/admin/visualisasi/mahasiswa/baru/create" class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-plus-lg"></i> Tambah</a>
      </div>
    </div>
    
    <div class="col-12" style="overflow-x: auto">
      <table class="table table-hover">
        <tr>
          <th class="text-center">No</th>
          <th>Tahun</th>
          <th class="text-center">Jumlah Lulus Seleksi</th>
          <th>Jumlah Mahasiswa Baru</th>
          <th>Jumlah Mahasiswa Baru (Transfer)</th>
          <th class="text-center">Aksi</th>
        </tr>
        @foreach ($mahasiswaBarus as $baru)
          <tr>
            <td class="text-center">{{ 1 + $loop->index }}</td>
            <td>{{ $baru->tahun }}</td>
            <td class="text-center">{{ $baru->lulus_seleksi }}</td>
            <td>{{ $baru->baru }}</td>
            <td>{{ $baru->baru_tf }}</td>
            <td class="text-center">
              <a class="text-primary" href="/admin/visualisasi/mahasiswa/baru/{{ $baru->id }}/edit"><i class="bi bi-pencil-square"></i></a>
              <button type="button" class="text-danger" style="background:none; border:none; padding:0;" data-toggle="modal" data-target="#confirmationDeleteModal-{{ $baru->id }}"><i class="bi bi-trash"></i></button>
              <div class="modal fade" id="confirmationDeleteModal-{{ $baru->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $baru->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered  " role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark" id="deleteModalLabel-{{ $baru->id }}">Konfirmasi Hapus Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body d-flex justify-content-start text-dark">
                      Apakah anda yakin ingin menghapus data&nbsp; <b>{{ $baru->tahun }}</b> &nbsp;ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <form class="d-inline" action="/admin/visualisasi/mahasiswa/baru/{{ $baru->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
</section>
@endsection