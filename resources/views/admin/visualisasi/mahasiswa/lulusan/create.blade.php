@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 9vh ;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Tambah Data Mahasiswa Lulusan</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container border rounded shadow" style="width:70%;">
    <form action="/admin/visualisasi/mahasiswa/lulusan" id="form" method="POST" enctype="multipart/form-data">
      <div class="row justify-content-between align-items-center p-3">
        @csrf
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="tahun" class="text-dark h6">Tahun</label>
            <input  class="form-control @error('tahun') is-invalid @enderror" type="text" name="tahun" id="tahun" value="{{ old('tahun') }}" required>
            @if ($errors->has('tahun'))
              <p class="error text-danger">{{ $errors->first('tahun') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="jumlah" class="text-dark h6">Jumlah Lulusan</label>
          <input  class="form-control @error('jumlah') is-invalid @enderror" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" required>
          @if ($errors->has('jumlah'))
            <p class="error text-danger">{{ $errors->first('jumlah') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="ipk" class="text-dark h6">Rata-rata IPK Lulusan</label>
          <input  class="form-control @error('ipk') is-invalid @enderror" type="number" step="0.01" max="4" name="ipk" id="ipk" value="{{ old('ipk') }}">
          @if ($errors->has('ipk'))
            <p class="error text-danger">{{ $errors->first('ipk') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="masa_studi" class="text-dark h6">Rata-rata Masa Studi Lulusan (Tahun)</label>
          <input  class="form-control @error('masa_studi') is-invalid @enderror" type="number" step="0.01" name="masa_studi" id="masa_studi" value="{{ old('masa_studi') }}">
          @if ($errors->has('masa_studi'))
            <p class="error text-danger">{{ $errors->first('masa_studi') }}</p>
          @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between mb-4">
          <a href="/admin/visualisasi/mahasiswa/lulusan"  class="btn btn-success wow fadeInRight" Data-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
          <button class="btn btn-success mx-1 wow fadeInRight" type="submit"><i class="bi bi-check-lg"></i> Submit</button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection