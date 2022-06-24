<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edufest | {{ $title }}</title>
    <!-- Script start -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Script end -->
    <!-- Style start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css"
        integrity="sha512-QmxybGIvkSI8+CGxkt5JAcGOKIzHDqBMs/hdemwisj4EeGLMXxCm9h8YgoCwIvndnuN1NdZxT4pdsesLXSaKaA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="/assets/styles/style.css" />
    <link rel="stylesheet" href="/assets/styles/nav.css" />
    <link rel="stylesheet" href="/assets/styles/header.css" />
    <link rel="stylesheet" href="/assets/styles/description.css" />
    <link rel="stylesheet" href="/assets/styles/agenda.css" />
    <link rel="stylesheet" href="/assets/styles/speakers.css" />
    <link rel="stylesheet" href="/assets/styles/faq.css" />
    <link rel="stylesheet" href="/assets/styles/footer.css" />
    <link rel="stylesheet" href="/assets/styles/sponsors-partners.css" />
    <link rel="stylesheet" href="/assets/styles/merchandise.css" />
    <link rel="stylesheet" href="/assets/styles/docs.css" />
    <link rel="stylesheet" href="/assets/styles/writingcont.css" />
    <link rel="stylesheet" href="/assets/styles/articles.css" />
    <link rel="stylesheet" href="/assets/styles/newsletter.css" />
    <!-- Style end -->

    <!-- Favicon start -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/edufest-icon.png">
    <!-- Favicon end -->

    <!-- START Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BFQS6Z9RBS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-BFQS6Z9RBS');
    </script>
    <!-- END Global site tag (gtag.js) - Google Analytics -->

</head>

<body class="main-page" id="top-page">
    <div class="page-loader">
        <img class="loading-image" src="/assets/img/gif/page-loader-white.gif" alt="Loading..." />
    </div>
    <nav id="navbar">
        <div class="nav-container nav-transparent">
            <div class="nav-body">
                <div class="nav-sections">
                    <ul class="nav-items">
                        <li><a href="{{ $title === 'Home' ? '#' : route('usr-home') }}"
                                class="nav-beranda">Beranda</a></li>
                        <li><a href="{{ $title === 'Pembicara' ? '#' : route('usr-speaker') }}"
                                class="nav-pembicara">Pembicara</a></li>
                        <li><a href="{{ $title === 'Agenda' ? '#' : route('usr-agenda') }}"
                                class="nav-agenda">Agenda</a></li>
                        <li><a href="{{ $title === 'Writing Contest' ? '#' : route('usr-wc') }}"
                                class="nav-writingcont">Writing Contest</a></li>
                        <li><a href="{{ $title === 'Docs' ? '#' : route('usr-docs') }}"
                                class="nav-dokumentasi">Dokumentasi</a></li>
                    </ul>
                    <div class="title-logo">
                        <a href="{{ $title === 'Home' ? '#' : route('usr-home') }}" class="gohome"><img
                                src="/assets/img/logos/Logo-Edufest.png" alt="Edufest Logo"></a>
                    </div>
                    <div class="nav-wrap">
                        <div class="menu-toggle">
                            <input type="checkbox">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield($title)
    @yield('Acara')
    @include('layouts.sponsors-partners')
    @include('layouts.faq')
    @include('layouts.footer')
    <a href="#top-page" class="fa fa-arrow-up go-top"></a>

    <script src="/assets/scripts/nav.js"></script>
    <script src="/assets/scripts/faq.js"></script>
    <script src="/assets/scripts/header.js"></script>
    <script src="/assets/scripts/page-loader.js"></script>
    <script src="/assets/scripts/slick-slider.js"></script>

    <script>
        AOS.init();
    </script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"
        integrity="sha512-h1Xtd9Xz5HglyzafV0MQ2j9RU30SbD+QdVRJXxdIdMixcGLiljJqtuu1W8Ig20IzYI8lskIKEppDJbF/zkdRtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
