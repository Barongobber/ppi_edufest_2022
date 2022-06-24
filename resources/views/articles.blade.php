@extends('layouts.main')

@section('Articles')

    <section class="articles-section">
        <header class="articles-main-header">
            <div class="articles-main-h1">
                <h1>"Artikel."</h1>
            </div>
            <div class="articles-main-header-deco">
                <h1>.22</h1>
            </div>
            <div class="articles-header-background">
                <img class="articles-header-bg1" src="../../../../../../assets/img/header/articles-deco.png" alt="">
                <img class="articles-header-bg2" src="../../../../../../assets/img/header/articles-deco-back.png" alt="">
            </div>
        </header>
        <div class="articles-main-content">
            <div class="articles-main-content-wrapper" id="list_article">
            </div>
            <div class="paginate d-flex mt-5 justify-content-center " data-aos="fade-up" data-aos-delay="1"
                data-aos-duration="1500"></div>
        </div>
    </section>
    <div class="modal fade" id="articlePdfModal" tabindex="-1" aria-labelledby="articlePdfModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body articles-modal-body" id="data_iframe">
                    <iframe class="mx-auto"
                        src="https://drive.google.com/file/d/1z6tiBJtsczVlEcLYKPRaDlCWsxSBJXQl/preview"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../../../api/articles/read",
                className: 'paginationjs-theme-red',
                success: function(result) {
                    let container = $('.paginate');
                    container.pagination({
                        dataSource: result,
                        pageSize: 12,
                        className: 'paginationjs-theme-red',
                        callback: function(data, pagination) {
                            let list = '';
                            $.each(data, function(key, article) {

                                list += `<div class="articles-box" data-aos="fade-up" data-aos-delay="200" data-aos-duration="2000">
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
                                </div>`
                            });
                            $('#list_article').html(list);
                            $(".paginationjs-pages").click(function() {
                                $([document.documentElement, document.body])
                                    .animate({
                                        scrollTop: $(".articles-main-content")
                                            .offset().top
                                    }, 100);
                            });
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
                    });
                }
            });
        })
    </script>

@endsection
