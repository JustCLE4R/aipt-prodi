@extends('layouts.visual')
@section('content')
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/lindy-uikit.css" />
    <link rel="stylesheet" href="/css/tiny-slider.css" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <section id="pricing" class="pricing-section pricing-style-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="section-title mb-60">
                        <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Visualisasi Data Akreditasi</h3>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Informasi dan Visualisasi Pusat Data Calon Mahasiswa,
                            Data Mahasiswa, Data Lulusan dan Sumber Daya Manusia</p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="pricing-active-wrapper wow fadeInUp" data-wow-delay=".4s">
                        <div class="pricing-active">
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Calon Mahasiswa</h4>
                                    <h3><i class="bi bi-gear"></i></h3>
                                    <div class="dropdown">
                                        <button class="button radius-30 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Kunjungi <i
                                            class="lni lni-angle-double-right"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="/visualisasi/mahasiswa/calon-mahasiswa/S1">S1</a></li>
                                          <li><a class="dropdown-item" href="/visualisasi/mahasiswa/calon-mahasiswa/S2">S2</a></li>
                                          <li><a class="dropdown-item" href="/visualisasi/mahasiswa/calon-mahasiswa/S3">S3</a></li>
                                          <li><a class="dropdown-item" href="/visualisasi/mahasiswa/calon-mahasiswa/Profesi">Profesi</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Mahasiswa Baru</h4>
                                    <h3><i class="bi bi-person-bounding-box"></i></h3>
                                    <div class="dropdown">
                                        <button class="button radius-30 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Kunjungi <i
                                            class="lni lni-angle-double-right"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-baru/S1">S1</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-baru/S2">S2</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-baru/S3">S3</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-baru/Profesi">Profesi</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Mahasiswa Aktif</h4>
                                    <h3><i class="bi bi-person-standing"></i></h3>
                                    <div class="dropdown">
                                        <button class="button radius-30 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Kunjungi <i
                                            class="lni lni-angle-double-right"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-aktif/S1">S1</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-aktif/S2">S2</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-aktif/S3">S3</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-aktif/Profesi">Profesi</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Mahasiswa Lulusan</h4>
                                    <h3><i class="bi bi-person-circle"></i></h3>
                                    <div class="dropdown">
                                        <button class="button radius-30 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Kunjungi <i
                                            class="lni lni-angle-double-right"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-lulusan/S1">S1</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-lulusan/S2">S2</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-lulusan/S3">S3</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/mahasiswa-lulusan/Profesi">Profesi</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Rasio Kelulusan</h4>
                                    <h3><i class="bi bi-check2-all"></i></h3>
                                    <div class="dropdown">
                                        <button class="button radius-30 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Kunjungi <i
                                            class="lni lni-angle-double-right"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/rasio-kelulusan/S1">S1</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/rasio-kelulusan/S2">S2</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/rasio-kelulusan/S3">S3</a></li>
                                            <li><a class="dropdown-item" href="/visualisasi/mahasiswa/rasio-kelulusan/Profesi">Profesi</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Mahasiswa Tugas Akhir</h4>
                                    <h3><i class="bi bi-mortarboard-fill"></i></h3>
                                    <a href="/visualisasi/mahasiswa/mahasiswa-tugas-akhir" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Mahasiswa Asing</h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <a href="/visualisasi/mahasiswa/mahasiswa-asing" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Dosen Berdasarkan Homebase</h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <a href="/visualisasi/sdm/dosen/per-homebase" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Dosen Berdasarkan Jabatan Akademik  </h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <a href="/visualisasi/sdm/dosen/per-jabatan" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Dosen Berdasarkan Pendidikan Akhir  </h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <a href="/visualisasi/sdm/dosen/per-pendidikan" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Dosen Berdasarkan Status Sertifikasi </h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <a href="/visualisasi/sdm/dosen/per-sertifikasi" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Dosen Tidak tetap  </h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <a href="/visualisasi/sdm/dosen/per-tidak-tetap" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                                
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Tenaga Kependidikan </h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <a href="/visualisasi/sdm/tendik" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Akreditsi Prodi</h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <a href="/visualisasi/akreditasi" target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/js/glightbox.min.js"></script>
    <script src="/js/tiny-slider.js"></script>
    <script>
        (function() {
            tns({
                container: '.pricing-active',
                autoplay: false,
                mouseDrag: true,
                gutter: 0,
                nav: false,
                controls: true,
                controlsText: [
                    '<i class="lni lni-chevron-left prev"></i>',
                    '<i class="lni lni-chevron-right prev"></i>',
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 1.2,
                    },
                    1200: {
                        items: 2,
                    }
                }
            });


        })();


    </script>
@endsection
