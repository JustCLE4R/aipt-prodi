@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 9vh ;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Edit Data Mahasiswa Baru</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container border rounded shadow" style="width:70%;">
    <form action="/admin/visualisasi/mahasiswa/baru/{{ $mahasiswaBaru->id }}" id="form" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row justify-content-between align-items-center p-3">
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="tahun" class="text-dark h6">Tahun</label>
            <input  class="form-control @error('tahun') is-invalid @enderror" type="text" name="tahun" id="tahun" value="{{ old('tahun', $mahasiswaBaru->tahun) }}" required>
            @if ($errors->has('tahun'))
              <p class="error text-danger">{{ $errors->first('tahun') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="lulus_seleksi" class="text-dark h6">Jumlah Lulus Seleksi</label>
          <input  class="form-control @error('lulus_seleksi') is-invalid @enderror" type="number" name="lulus_seleksi" id="lulus_seleksi" value="{{ old('lulus_seleksi', $mahasiswaBaru->lulus_seleksi) }}" required>
          @if ($errors->has('lulus_seleksi'))
            <p class="error text-danger">{{ $errors->first('lulus_seleksi') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="baru" class="text-dark h6">Jumlah Mahasiswa Baru</label>
          <input  class="form-control @error('baru') is-invalid @enderror" type="number" name="baru" id="baru" value="{{ old('baru', $mahasiswaBaru->baru) }}">
          @if ($errors->has('baru'))
            <p class="error text-danger">{{ $errors->first('baru') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="baru_tf" class="text-dark h6">Jumlah Mahasiswa Baru (Transfer)</label>
          <input  class="form-control @error('baru_tf') is-invalid @enderror" type="number" name="baru_tf" id="baru_tf" value="{{ old('baru_tf', $mahasiswaBaru->baru_tf) }}">
          @if ($errors->has('baru_tf'))
            <p class="error text-danger">{{ $errors->first('baru_tf') }}</p>
          @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between mb-4">
          <a href="/admin/visualisasi/mahasiswa/baru"  class="btn btn-success wow fadeInRight" Data-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
          <button class="btn btn-success mx-1 wow fadeInRight" type="submit"><i class="bi bi-check-lg"></i> Submit</button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection