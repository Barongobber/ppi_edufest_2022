@extends('layouts.main')

@section('Docs')

<section>
    <div class="docs-container">
        <header class="docs-header">
            <div class="docs-headerbox translate" data-speed="0.6">
                <h1>Dokumen-</h1>
                <div class="doc-row">
                    <h1>tasi / </h1><svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="13.5" cy="13.5" r="13.5" fill="#fffb00"/></svg>
                </div>
                <img src="../assets/img/header/mascot-head-smile.png" alt="">
            </div>
            <div class="docs-scroll-down">
                <p>Scroll Down</p>
                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
            </div>
            <div class="docs-edufest-rounded"><img src="../assets/img/logos/edufest-round-text.svg" alt="edufest 2022"></div>
        </header>
        <div class="docs-box-container">
            <div class="docs-box" data-aos="zoom-in-up" data-aos-delay="30" data-aos-duration="1000">
                <iframe id="driveFrame" class="drive-frame" src="https://googledriveembedder.collegefam.com/?key=AIzaSyAW730mQwTrCsypb9vYL4Bp-bRlz8kdzVs&folderid=14OJKxStmA43brh8UT6yvWI1FDgcviu53" ></iframe>
            </div>
        </div>
    </div>
</section>

@endsection
