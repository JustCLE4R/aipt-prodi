@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 9vh ;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Edit Data Mahasiswa Aktif</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container border rounded shadow" style="width:70%;">
    <form action="/admin/visualisasi/mahasiswa/aktif/{{ $mahasiswaAktif->id }}" id="form" method="POST" enctype="multipart/form-data">
      <div class="row justify-content-between align-items-center p-3">
        @method('PUT')
        @csrf
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="tahun" class="text-dark h6">Tahun</label>
          <input  class="form-control @error('tahun') is-invalid @enderror" type="text" name="tahun" id="tahun" value="{{ old('tahun', $mahasiswaAktif->tahun) }}" required>
          @if ($errors->has('tahun'))
            <p class="error text-danger">{{ $errors->first('tahun') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="jumlah" class="text-dark h6">Jumlah Mahasiswa Aktif</label>
          <input  class="form-control @error('jumlah') is-invalid @enderror" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $mahasiswaAktif->jumlah) }}" required>
          @if ($errors->has('jumlah'))
            <p class="error text-danger">{{ $errors->first('jumlah') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="jumlah_tf" class="text-dark h6">Jumlah Mahasiswa Aktif (Transfer)</label>
          <input  class="form-control @error('jumlah_tf') is-invalid @enderror" type="number" name="jumlah_tf" id="jumlah_tf" value="{{ old('jumlah_tf', $mahasiswaAktif->jumlah_tf) }}">
          @if ($errors->has('jumlah_tf'))
            <p class="error text-danger">{{ $errors->first('jumlah_tf') }}</p>
          @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between mb-4">
          <a href="/admin/visualisasi/mahasiswa/aktif"  class="btn btn-success wow fadeInRight" Data-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
          <button class="btn btn-success mx-1 wow fadeInRight" type="submit"><i class="bi bi-check-lg"></i> Submit</button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection