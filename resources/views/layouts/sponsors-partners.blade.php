<section class="sponsors-partners-container">
    <div class="sponsors-wrapper">
        <div class="sponsor-header-att">
            <p class="effect-pop-slide-l">OUR</p>
            <p class="effect-pop-slide-l">SP<span>O</span>NS<span>O</span>R<span>S</span></p>
        </div>
        <div class="sponsors-cont"></div>
    </div>
    <div class="partners-wrapper">
        <div class="partner-header-att">
            <p class="effect-pop-slide-r">OUR</p>
            <p class="effect-pop-slide-r">P<span>A</span>RTN<span>E</span>R<span>S</span></p>
        </div>
        <div class="partner-items partner-slider" id="list-partners">
        </div>
    </div>
</section>

<div class="modal fade" id="sponsor-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sponsor-title">Sponsor Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "../../api/partners/read",
            success: function(result) {
                var partnerItems = '';
                if (result.length === 0) {
                    $('#partners__row').after(
                        '<td colspan="4" class="text-center" >There is no data exist here</td>');
                } else {
                    $.each(result, function(key, partner) {
                        partnerItems +=
                            `<div class="partner-img-wrapper" style="display: flex; margin-left:10px; margin-right:10px;" >
                                    <img src="../../storage/img/partners/${partner["id"]}/${partner["picture"]}" alt="Partner" class="partner-img">
                            </div>`;
                    });
                    $('#list-partners').append(partnerItems);
                    partnerSlider();
                }
            }
        });
        $.ajax({
            type: "GET",
            url: "../../api/sponsors/read",
            success: function(result) {
                if (result.length === 0) {

                } else {
                    var sponsorItems = '';
                    $.each(result, function(key, sponsor) {
                        sponsorItems +=
                            `<a href="" data-bs-toggle="modal" id=${"sponsor" + sponsor["id"]} desc="${sponsor["detail"]}" title="${sponsor["name"]}" data-bs-target="#sponsor-modal" class="sponsor-wrapper" data-aos="zoom-in-up" data-aos-delay="20" data-aos-duration="1000">
                            <img src="../../storage/img/sponsors/${sponsor["id"]}/${sponsor["picture"]}" alt="">
                        </a>`;
                    });
                    $('.sponsors-cont').append(sponsorItems);
                    $('.sponsor-wrapper').click(function() {
                        $('.modal-body').empty();
                        $('#sponsor-title').empty();
                        $('#sponsor-title').append($(this).attr("title"));
                        $('.modal-body').append($(this).attr("desc"));
                    });
                }
            }
        });
    });
</script>
