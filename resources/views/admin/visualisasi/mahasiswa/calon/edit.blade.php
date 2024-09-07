@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 9vh ;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Edit Data Calon Mahasiswa</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container border rounded shadow" style="width:70%;">
    <form action="/admin/visualisasi/mahasiswa/calon/{{ $calonMahasiswa->id }}" id="form" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row justify-content-between align-items-center p-3">
      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
        <label for="tahun" class="text-dark h6">Tahun</label>
        <input  class="form-control @error('tahun') is-invalid @enderror" type="text" name="tahun" id="tahun" value="{{ old('tahun', $calonMahasiswa->tahun) }}" required>
        @error('tahun')
          <p class="error text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
        <label for="daya_tampung" class="text-dark h6">Daya Tampung</label>
        <input  class="form-control @error('daya_tampung') is-invalid @enderror" type="number" name="daya_tampung" id="daya_tampung" value="{{ old('daya_tampung', $calonMahasiswa->daya_tampung) }}" required>
        @error('daya_tampung')
        <p class="error text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
        <label for="pendaftar" class="text-dark h6">Pendaftar</label>
        <input  class="form-control @error('pendaftar') is-invalid @enderror" type="number" name="pendaftar" id="pendaftar" value="{{ old('pendaftar', $calonMahasiswa->pendaftar) }}" required>
        @error('pendaftar')
        <p class="error text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
        <label for="lulus_seleksi" class="text-dark h6">Lulus Seleksi</label>
        <input  class="form-control @error('lulus_seleksi') is-invalid @enderror" type="number" name="lulus_seleksi" id="lulus_seleksi" value="{{ old('lulus_seleksi', $calonMahasiswa->lulus_seleksi) }}" required>
        @error('lulus_seleksi')
        <p class="error text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between mb-4">
        <a href="/admin/visualisasi/mahasiswa/calon"  class="btn btn-success wow fadeInRight" Data-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
        <button class="btn btn-success mx-1 wow fadeInRight" type="submit"><i class="bi bi-check-lg"></i> Submit</button>
      </div>
      </div>
    </form>
  </div>
</section>
@endsection