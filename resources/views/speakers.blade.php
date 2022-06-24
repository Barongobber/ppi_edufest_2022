@extends('layouts.main')

@section('Pembicara')

    <section>
        <div class="sp-speakers-container">
            <div class="sp-speaker-col">
                <h1>BINTANG TAMU<br />SPECIAL</h1>
                <div class="sp-speaker-img-cont">
                    <img src="assets/img/header/special-guest-edufest.png" alt="Bintang Tamu Spesial">
                </div>
            </div>
            <header class="sp-speaker-header-deco">
                <img class="translateX" data-speed="0.6" src="assets/img/header/header-deco-right.png" alt="">
                <img class="translateX" data-speed="-0.6" src="assets/img/header/header-deco-left.png" alt="">
            </header>
            <div class="sp-scroll-down">
                <p>Scroll Down</p>
                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
            </div>
            <div class="sp-edufest-rounded"><img src="../assets/img/logos/edufest-round-text.svg" alt="edufest 2022"></div>
        </div>
        <div class="speakers-container">
            <div class="speakers-wrapper">
                <div class="speakers-h1 effect-pop-up">
                    <h1 class="speakers-title" data-aos="fade-down" data-aos-delay="30" data-aos-duration="2000">PEMBICARA
                    </h1>
                </div>
                <div class="speakers-content">
                    <div class="filters-div">
                        <select name="Kawasan" id="kawasan-filter" class="filter-bar">
                            <option value="">Show all</option>
                            <option value="timtengka">Timur Tengah dan Afrika</option>
                            <option value="asia_oseania">Asia dan Oseania</option>
                            <option value="amerop">Eropa dan Amerika</option>
                        </select>
                        <div class="filter-separator"></div>
                        <form id="form_speaker" class="m-0">
                            <input class="form-control search-bar speakers-search-bar" id="search-input" type="text"
                                placeholder="Search..">
                            <button class="search-submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="speakers-grid">
                    </div>
                    <div class="paginate d-flex mt-5 justify-content-center " data-aos="fade-up" data-aos-delay="1"
                        data-aos-duration="1500"></div>
                </div>
            </div>
            <div class="speaker-blank-transition"></div>
        </div>
    </section>
    <script>
        $("#form_speaker").submit(function(e) {
            e.preventDefault();
            searchSpeakerByName();
        });
        $('#kawasan-filter').on('change', function() {
            console.log("oke serach")
            searchSpeakerByRegion();
        })
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../../../api/speakers/read",
                className: 'paginationjs-theme-red',
                success: function(result) {
                    let container = $('.paginate');
                    container.pagination({
                        dataSource: result,
                        pageSize: 12,
                        className: 'paginationjs-theme-red',
                        callback: function(data, pagination) {
                            var listSpeaker = '';
                            if(data.length == 0) {
                                listSpeaker = '<h3 class="text-white">Tidak ada hasil. </h3>'
                            }
                            $.each(data, function(key, speaker) {
                                listSpeaker +=
                                    `
                              <div class="custom-card" data-aos="fade-up" data-aos-delay="30" data-aos-duration="2000">
                              <div class="img__card-container">
                                <img src="../../storage/img/speakers/${speaker["id"]}/${speaker["picture"]}" class="card__image" alt="Speaker" />
                              </div>
                              <div class="card__overlay speaker-card-overlay">
                                <div class="card__header">
                                    <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="card__header-text">
                                        <h3 class="card__title speaker__name">${speaker['name']}</h3>
                                        <span class="card__status speaker__ppi"><i class="material-icons-round">public</i>${speaker['ppi']}</span>
                                    </div>
                                </div>
                                <hr>
                                <p class="card__desc_school"><i class="material-icons-round">school</i>${speaker['school']}</p>
                                <p class="card__desc_major">${speaker['major']}</p><hr>
                                <p class="card__description speaker__desc">${speaker['detail']}</p>
                              </div>
                              </div>
                            `
                            });
                            $('.speakers-grid').html(listSpeaker);
                            $(".paginationjs-pages").click(function() {
                                $([document.documentElement, document.body])
                                    .animate({
                                        scrollTop: $(".speakers-grid")
                                            .offset().top
                                    }, 100);
                            });
                        }
                    });
                }
            });

        });

        function injectData(data, pagination) {
            var listSpeaker = '';
            if (data.length == 0) {
                listSpeaker = '<h3 class="text-white">Tidak ada hasil. </h3>'
            }
            $.each(data, function(key, speaker) {
                listSpeaker +=
                    `
                              <div class="custom-card" data-aos="fade-up" data-aos-delay="30" data-aos-duration="2000">
                              <div class="img__card-container">
                                <img src="../../storage/img/speakers/${speaker["id"]}/${speaker["picture"]}" class="card__image" alt="Speaker" />
                              </div>
                              <div class="card__overlay">
                                <div class="card__header">
                                    <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                        <path />
                                    </svg>
                                    <div class="card__header-text">
                                        <h3 class="card__title speaker__name">${speaker['name']}</h3>
                                        <span class="card__status speaker__ppi"><i
                                                class="material-icons-round">public</i>${speaker['ppi']}</span>
                                    </div>
                                </div>
                                <p class="card__description speaker__desc">${speaker['detail']}</p>
                              </div>
                              </div>
                            `
            });
            $('.speakers-grid').html(listSpeaker);
            $(".paginationjs-pages").click(function() {
                $([document.documentElement, document.body])
                    .animate({
                        scrollTop: $(".speakers-grid")
                            .offset().top
                    }, 100);
            });
        }

        function searchSpeakerByName() {
            console.log("oke search")
            let searchString = $("#search-input").val();
            $.ajax({
                type: "GET",
                url: `../../../api/speakers/read?search=${searchString}`,
                className: 'paginationjs-theme-red',
                success: function(result) {
                    let container = $('.paginate');
                    container.pagination({
                        dataSource: result,
                        pageSize: 12,
                        className: 'paginationjs-theme-red',
                        callback: function(data, pagination) {
                            injectData(data, pagination);
                        }
                    });
                }
            });
        }

        function searchSpeakerByRegion() {
            let searchString = $("#kawasan-filter").val();
            $.ajax({
                type: "GET",
                url: `../../../api/speakers/read?region=${searchString}`,
                className: 'paginationjs-theme-red',
                success: function(result) {
                    let container = $('.paginate');
                    container.pagination({
                        dataSource: result,
                        pageSize: 12,
                        className: 'paginationjs-theme-red',
                        callback: function(data, pagination) {
                            injectData(data, pagination);
                        }
                    });
                }
            });
        }
    </script>
@endsection
