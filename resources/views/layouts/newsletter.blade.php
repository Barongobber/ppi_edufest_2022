<div id="popup1" class="overlay">
    <div class="popup"> <a class="close" onclick="xBtnNewsletter()">&times;</a>
        <div id="dialog" class="window">

            <div class="box2">
                <div class="image-box2-wrapper">
                    <img src="../../../../assets/img/bg/Edufest_ACT.png" alt="ACT">
                </div>
            </div>
            <div class="box" style="overflow: scroll">
                <div class="newletter-title">
                    <h2>Bersama PPI Edufest, Berikan Beasiswa untuk Siswa Tepian Negeri Indonesia!</h2>
                </div>
                <div class="box-content newleter-content">
                    <label>Puluhan siswa MIS Sabilillah Podang terancam putus sekolah karena keterbatasan biaya. Bersama PPI Edufest, yuk kita hadiahkan beasiswa untuk adik-adik di pelosok Nusa Tenggara Timur!</label>
                    <div id="frm_subscribe">
                        <form name="subscribe" id="subscribe_popup">
                            <div>
                                <!-- <span class="required">*</span><span>Email</span>-->
                                {{-- <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail">
                                <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname"> --}}
                                <div id="notification"></div>
                                <a class="button" href="https://indonesiadermawan.id/campaign/27764/bersama-ppi-edufest-berikan-beasiswa-untuk-siswa-tepian-negeri-indonesia" target="_blank"><span>Sedekah Sekarang</span></a>
                            </div>
                        </form>
                        {{-- <div class="subscribe-bottom">
                            <input type="checkbox" id="newsletter_popup_dont_show_again">
                            <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function xBtnNewsletter(){
                $( "#popup1" ).removeClass( "shownewsletter" )
            }

            $(document).ready(function() {
                $('#popup1').addClass('shownewsletter');
            });
</script>
