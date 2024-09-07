@extends('layouts.main')

@section('content')
<section id="services" class="section-padding">
  <div class="container mt-5">
    <div class="section-header text-center ">
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Admin Viusalisasi</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
    </div>
    <div class="row justify-content-center" >
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-12">
        <div class="dropdown">
          <div class="icon dropdown-toggle" id="dropdownMenuButtonMahasiswa" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="lni-cog"></i>
          </div>
          <div class="services-content">
            <span class="h4 text-success">Mahasiswa</span>
          </div>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonMahasiswa">
            <a class="dropdown-item" href="visualisasi/mahasiswa/calon">Calon</a>
            <a class="dropdown-item" href="visualisasi/mahasiswa/baru">Baru</a>
            <a class="dropdown-item" href="visualisasi/mahasiswa/aktif">Aktif</a>
            <a class="dropdown-item" href="visualisasi/mahasiswa/lulusan">Lulusan</a>
            <a class="dropdown-item" href="visualisasi/mahasiswa/rasio-kelulusan">Rasio Kelulusan</a>
            <a class="dropdown-item" href="visualisasi/mahasiswa/tugas-akhir">Tugas Akhir</a>
            <a class="dropdown-item" href="visualisasi/mahasiswa/asing">Asing</a>
          </div>
        </div>
      </div>
      
      
      

      <div class="col-md-6 col-lg-4 col-12">
        <div class="dropdown">
          <div class="icon dropdown-toggle" id="dropdownMenuButtonDosen" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="lni-cog"></i>
          </div>
          <div class="services-content">
            <span class="h4 text-success">Dosen</span>
          </div>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDosen">
            <a class="dropdown-item" href="visualisasi/sdm/dosen/per-homebase">Per Homebase</a>
            <a class="dropdown-item" href="visualisasi/sdm/dosen/per-jabatan">Per Jabatan</a>
            <a class="dropdown-item" href="visualisasi/sdm/dosen/per-pendidikan">Per Pendidikan</a>
            <a class="dropdown-item" href="visualisasi/sdm/dosen/per-sertifikasi">Per Sertifikasi</a>
            <a class="dropdown-item" href="visualisasi/sdm/dosen/tidak-tetap">Tidak Tetap</a>
          </div>
        </div>
      </div>
      

      <div class="col-md-6 col-lg-4 col-xs-12">
        <a class="h4 text-success" href="visualisasi/sdm/tendik">
          <div class="services-item bg-light border wow fadeInRight py-5" data-wow-delay="0.3s">
            <div class="icon">
              <i class="lni-cog"></i>
            </div>
            <div class="services-content">
              <span><a class="h4 text-success" href="visualisasi/sdm/tendik">Tendik</a></span>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection