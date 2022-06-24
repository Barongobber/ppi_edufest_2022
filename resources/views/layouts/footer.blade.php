<footer>
    <div class="footer-container">
        <div class="footer-wrapper">
            <div class="footer-col1 f-col">
                <div class="footer-col1-box1">
                    <div class="footer-logos">
                        <img id="footer-ppid-logo" src="/assets/img/logos/PPI Dunia.png" alt="Logo PPID">
                        <img id="footer-felari-logo" src="/assets/img/logos/Felari.png" alt="Logo Felari">
                        <img id="footer-ppm-logo" src="/assets/img/logos/logo ppm.PNG" alt="Logo PPM">
                    </div>
                    <div class="footer-cr">Copyright © 2021 PPI Dunia<br>All rights served</div>
                </div>
                <div class="footer-nav-lists">
                    <a href="{{ ($title === "Home")?'#': route('usr-home') }}" class="f-nav-list effect-pop-slide-r">Beranda</a >
                    <a href="{{ ($title === "Pembicara")?'#': route('usr-speaker') }}" class="f-nav-list effect-pop-slide-r">Pembicara</a >
                    <a href="{{ ($title === "Agenda")?'#': route('usr-agenda') }}" class="f-nav-list effect-pop-slide-r">Agenda</a >
                    <a href="{{ ($title === "Writing Contest")?'#': route('usr-wc') }}" class="f-nav-list effect-pop-slide-r">Writing Contest</a >
                    <a href="{{ ($title === "Docs")?'#': route('usr-docs')}}" class="f-nav-list effect-pop-slide-r">Dokumentasi</a >
                </div>
            </div>
            <div class="footer-col2 f-col">
                <h1 class="footer-h1">Contact Us</h1>
                <div class="footer-col2-row1">
                    <div class="section1-f-soc">
                        <a class="f-soc shfb" href="https://www.facebook.com/ppi.edufest" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a class="f-soc shig" href="https://www.instagram.com/ppi.edufest/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                    <div class="section1-f-soc">
                        <a class="f-soc shml" href="mailto:ppiedufest@ppi.id"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                        <a class="f-soc shwa" href="https://wa.me/6281802022242" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
