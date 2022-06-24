@extends('layouts.main')

@section('Writing Contest')

<section>
    <header class="wc-index-header">
        <h1 class="wc-index-title translate" data-speed="0.6">WRITING CONTEST</h1>
        <div class="wc-index-header-img">
            <img src="../../assets/img/header/pencil.png" class="wc-index-pencil" alt="">
            <div class="wc-halfcircle translate" data-speed="0.6"></div>
        </div>
        <img class="wc-curve-r translateX" data-speed="0.6" src="../../assets/img/header/header-curve-right.png" alt="">
        <img class="wc-curve-l translateX" data-speed="-0.6" src="../../assets/img/header/header-curve-left.png" alt="">
    </header>
    <div class="wc-index-body">
        <div class="agenda-container">

            <div class="agenda-wrapper">
                <h1 class="agenda-sec-h1 effect-pop-up">- Artikel -</h1>
                <div class="agenda-section">
                    <ul id="lightSlider-agenda-section" class="responsive-slider">
                    </ul>
                    <ul id="no-slider-section">
                    </ul>
                </div>
                <p class="swipe-for-more "></p>
                {{-- <p class="swipe-for-more ">Swipe for more >></p> --}}
                <a href="/artikel" class="text-decoration-none"><button class="home-agenda-button button-56 mt-sm-2 mt-lg-5 "
                        role="button">Lihat Semua Artikel</button></a>
            </div>
        </div>
        <div class="wc-index-body-cont">
            <a class="wc-index-list1 effect-pop-up" style="text-decoration: none!important" data-tf-slider="eAC5S3mo" data-tf-width="550" data-tf-iframe-props="title=PPI Edufest - Writing Contest" data-tf-medium="snippet">
                <div class="wc-folder-outerbox1"></div>
                <div class="wc-folder-box1">
                   <div class="wc-folder-box1-tag" style="text-decoration: none!important;">Pendaftaran</div>
                   <div class="wc-folder-box1-arrow"><i class="fa fa-arrow-right"></i></div>
                </div>
            </a>
            {{-- <a class="wc-index-list2 effect-pop-up" style="text-decoration: none!important">
                <div class="wc-folder-outerbox2"></div>
                <div class="wc-folder-box2">
                    <div class="wc-folder-box2-tag" style="text-decoration: none!important;">Arsip<br>Writing Contest<br>2021</div>
                    <div class="wc-folder-box2-arrow"><i class="fa fa-arrow-right"></i></div>
                </div>
            </a> --}}
        </div>
        <div class="wc-ku-body-row ku-row-date">
            <div class="wc-ku-row-date-wrapper">
                <i class="wc-date-title fa fa-calendar" aria-hidden="true"></i>
                <div class="wc-ku-row-date-row effect-pop-up">
                    <h1 class="wc-date-date1">01-Feb-22</h1>
                    <h3 class="wc-date-desc1">Pembukaan</h3>
                </div>
                <div class="wc-ku-row-date-row effect-pop-up">
                    <h1 class="wc-date-date1">20-Mar-22</h1>
                    <h3 class="wc-date-desc1">Penutupan</h3>
                </div>
                <div class="wc-ku-row-date-row effect-pop-up">
                    <h1 class="wc-date-date1">21-Mar ~<br>02-Apr-22</h1>
                    <h3 class="wc-date-desc1">Penjurian</h3>
                </div>
                <div class="wc-ku-row-date-row effect-pop-up">
                    <h1 class="wc-date-date1">03-Apr-22</h1>
                    <h3 class="wc-date-desc1">Pengumuman</h3>
                </div>
            </div>
        </div>
        <div class="wc-index-body-cont2">
            <div class="wc-ku-title">
                <h1>Ketentuan Umum</h1>
            </div>
        </div>
        <div class="wc-ku-body-row ku-row-1">
            <div class="ku-row-1-wrapper">
                <h2 class="wc-ku-row1-sec1">Tema</h2>
                <h1 class="wc-ku-row1-sec2 effect-pop-up">"Sepenggal kisah dari penjuru dunia, sejuta inspirasi untuk Indonesia"</h1>
            </div>
        </div>
        <div class="wc-ku-body-row ku-row-2">
            <div class="ku-row-2-wrapper">
                <div class="wc-ku-row2-sec1">
                    <h1>Subtema</h1>
                </div>
                <div class="wc-ku-row2-sec2">
                    <div class="wc-ku-row2-sec2-box effect-pop-slide-l ">
                        <p>"Suka duka  mahasiswa Indonesia di luar negeri."</p>
                    </div>
                    <div class="wc-ku-row2-sec2-box effect-pop-slide-l ">
                        <p>"Kontribusi mahasiswa di luar negeri untuk bangsa Indonesia."</p>
                    </div>
                    <div class="wc-ku-row2-sec2-box effect-pop-slide-l ">
                        <p>"Perjuangan pelajar meraih beasiswa di luar negeri."</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wc-ku-body-row ku-row-3">
            <div class="wc-ku-row-3-wrapper">
                <div class="wc-ku-row3-sec1 effect-pop-up">
                    <h1 class="wc-ku-row3-sec1-tema">Syarat Peserta</h1>
                    <div class="wc-ku-row3-sec1-lists">
                        <p>1. Pelajar Indonesia yang aktif menempuh pendidikan di luar negeri.</p>
                        <p>2. Follow akun PPI Edufest.</p>
                    </div>
                </div>
                <div class="wc-ku-row3-sec2 effect-pop-up">
                    <h1 class="wc-ku-row3-sec2-tema">Ketentuan Penulisan</h1>
                    <div class="wc-ku-row3-sec2-lists">
                        <p>1. Naskah merupakan cerita pendek, memiliki tokoh dan berdialog.</p>
                        <p>2. Premis bebas selama masih berkaitan dengan tema dan subtema.</p>
                        <p>3. Terdiri dari 1000 - 1500 kata.</p>
                        <p>4. A4, Times New Roman, ukuran 12, spasi 1.5 dan margin normal.</p>
                        <p>5. Belum pernah dipublikasikan di manapun sebelumnya.</p>
                        <p>6. Tidak mengandung unsur SARA, pornografi dan plagiarisme.</p>
                        <p>7. Melampirkan gambar-gambar pendukung (opsional).</p>
                        <p>8. Peserta hanya bisa mengirimkan 1 naskah.</p>
                        <p>9. Halaman terakhir berisi profil pendaftar (mak.100 kata) dilengkapi foto diri.</p>
                        <p>10. Semua tulisan yang didaftarkan akan menjadi milik PPI Edufest.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wc-ku-body-row ku-row-4">
            <div class="wc-ku-row-4-wrapper">
                <h1 class="wc-ku-row4-sec1">Penilaian</h1>
                <div class="wc-ku-row4-sec2">
                    <div class="wc-ku-row4-sec2-box effect-pop-up">
                        <p>1. Orisinalitas dan kreativitas.</p>
                    </div>
                    <div class="wc-ku-row4-sec2-box effect-pop-up">
                        <p>2. Premis yang disuguhkan.</p>
                    </div>
                    <div class="wc-ku-row4-sec2-box effect-pop-up">
                        <p>3. Kesesuaian dengan tema.</p>
                    </div>
                    <div class="wc-ku-row4-sec2-box effect-pop-up">
                        <p>4. Gaya bahasa dan teknik kepenulisan.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wc-ku-body-row ku-row-5">
            <div class="wc-ku-row-5-wrapper">
                <h1 class="wc-ku-row5-sec1">Hadiah</h1>
            </div>
        </div>
        <div class="wc-ku-body-row ku-row-6">
            <div class="wc-ku-row-6-wrapper">
                <div class="wc-ku-row6-sec1 effect-pop-up">
                    <div class="wc-ku-row6-sec1-box">
                        <h2 class="wc-ku-row6-sec1-tema">Juara 1</h2>
                        <p class="wc-ku-row6-sec1-text">Rp. 2.000.000</p>
                        <p class="wc-ku-row6-sec1-text">Piagam</p>
                        <p class="wc-ku-row6-sec1-text">Merchandise Edufest</p>
                    </div>
                </div>
                <div class="wc-ku-row6-sec1">
                    <div class="wc-ku-row6-sec1-box effect-pop-up">
                        <h2 class="wc-ku-row6-sec1-tema">Juara 2</h2>
                        <p class="wc-ku-row6-sec1-text">Rp. 1.500.000,</p>
                        <p class="wc-ku-row6-sec1-text">Piagam</p>
                        <p class="wc-ku-row6-sec1-text">Merchandise Edufest</p>
                    </div>
                    <div class="wc-ku-row6-sec1-box effect-pop-up">
                        <h2 class="wc-ku-row6-sec1-tema">Juara 3</h2>
                        <p class="wc-ku-row6-sec1-text">Rp. 1.000.000,</p>
                        <p class="wc-ku-row6-sec1-text">Piagam</p>
                        <p class="wc-ku-row6-sec1-text">Merchandise Edufest</p>
                    </div>
                </div>
                <div class="wc-ku-row6-sec2">
                    <p class="wc-ku-row6-sec2-text">10 naskah terbaik akan diterbitkan dalam bentuk buku, dan 10 penulis akan mendapatkan buku antologinya secara gratis.</p>
                </div>
            </div>
        </div>
        <div class="wc-ku-body-row ku-row-8">
            <div class="wc-ku-row-8-wrapper">
                <h1 class="wc-ku-row8-tema">Narahubung</h1>
                <div class="ku-row-8-boxes">
                    <a class="wc-cp ku-row-8-box ku-row-8-box1" href="https://wa.me/905526267123" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i>Sunarto Natsir</a>
                    <a class="wc-cp ku-row-8-box ku-row-8-box2" href="https://wa.me/218944619486" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i>Fina Septia</a>
                </div>
            </div>
        </div>
        <div class="wc-ku-body-row ku-row-7"></div>
    </div>
    <div class="modal fade" id="writing-cont-modal" tabindex="-1" aria-labelledby="writing-cont-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Waktu Pelaksanaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body wc-index-modal-body">
                    <div class="wc-index-modal-body-wrapper">
                        <div class="wc-index-modal-col">
                            <h2 class="wc-index-modal-title">Pembukaan: </h2>
                            <h2 class="wc-index-modal-title">Penutupan: </h2>
                            <h2 class="wc-index-modal-title">Penjurian: </h2>
                            <h2 class="wc-index-modal-title">Pengumuman: </h2>
                        </div>
                        <div class="wc-index-modal-col">
                            <p class="wc-index-modal-desc">1 Februari 2022</p>
                            <p class="wc-index-modal-desc">20 Maret 2022</p>
                            <p class="wc-index-modal-desc">21 Maret – 2 April 2022</p>
                            <p class="wc-index-modal-desc">3 April 2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="articlePdfModal" tabindex="-1" aria-labelledby="articlePdfModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body articles-modal-body" id="data_iframe">

            </div>
        </div>
    </div>
</div>
<script src="//embed.typeform.com/next/embed.js"></script>
<script>
    $(window).on('load', function() {
        $('#writing-cont-modal').modal('show');
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "../../../api/articles/read",
            success: function(result) {
                var list = '';
                if (result.length === 0) {
                    $(".agenda-container").hide();
                }
                else if(result.length <= 3){
                    $.each(result, function(key, article) {
                        list += `<li><div class="articles-box">
                                    <div class="articles-box-row">
                                        <h1 class="articles-box-title">${article['title']}</h1>
                                        <h2 class="articles-box-subtitle">${article['writer']}</h2>
                                    </div>
                                    <div class="articles-box-row  articles-box2">
                                        <p class="articles-box-desc">
                                            ${article['description']}
                                        </p>
                                    </div>
                                    <div class="articles-box-row">
                                        <a type="button" data-article="${article['file']}" data-id="${article['id']}" data-bs-toggle="modal" data-bs-target="#articlePdfModal" class="btn button-56 link_read">Baca</a>
                                    </div>
                                </div></li>`;
                    });
                    $("#lightSlider-agenda-section").hide();
                    $('#no-slider-section').append(list);
                    $(".link_read").click(function() {
                                let picture = $(this).attr("data-article");
                                let id = $(this).attr("data-id");
                                $("#data_iframe").html(
                                    '<iframe class="mx-auto" src="{{ url('/storage/file/articles/') }}/' +
                                    id +
                                    '/' +
                                    picture +
                                    '" allow="autoplay"></iframe>'
                                )
                            })
                }

                else {
                    $.each(result, function(key, article) {
                        list += `<li><div class="articles-box">
                                    <div class="articles-box-row">
                                        <h1 class="articles-box-title">${article['title']}</h1>
                                        <h2 class="articles-box-subtitle">${article['writer']}</h2>
                                    </div>
                                    <div class="articles-box-row  articles-box2">
                                        <p class="articles-box-desc">
                                            ${article['description']}
                                        </p>
                                    </div>
                                    <div class="articles-box-row">
                                        <a type="button" data-article="${article['file']}" data-id="${article['id']}" data-bs-toggle="modal" data-bs-target="#articlePdfModal" class="btn button-56 link_read">Baca</a>
                                    </div>
                                </div></li>`;
                    });
                    $("#no-slider-section").hide();
                    $('#lightSlider-agenda-section').append(list);
                    $(".link_read").click(function() {
                                let picture = $(this).attr("data-article");
                                let id = $(this).attr("data-id");
                                $("#data_iframe").html(
                                    '<iframe class="mx-auto" src="{{ url('/storage/file/articles/') }}/' +
                                    id +
                                    '/' +
                                    picture +
                                    '" allow="autoplay"></iframe>'
                                )
                            })
                    articleSlider();
                }
            }
        });
    });
</script>

@endsection
