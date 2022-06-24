@extends('layouts.main')

@section('Acara')
    <section>
        <div class="event-container">
            <div class="event-header">
                <div class="event-header-row">
                    <img class="effect-pop-up" id="event_image">
                    <h1 class="effect-pop-slide-r" id="event_title"></h1>
                </div>
                <div class="event-img-blur-cover" id="event_image_blur">

                </div>
            </div>
            <div class="event-wrapper">
                <div class="event-detail-section">
                    <div class="event-time-info effect-pop-slide-r">
                        <h3><span class="fa fa-calendar" style="margin-right: 10px"></span>Waktu Pelaksanaan: <span
                                class="effect-pop-up event_date"></span></h3>
                    </div>
                    <div class="event-deadline-info effect-pop-slide-r">
                        <h4>Penutupan Pendaftaran: <span class="effect-pop-up event_date"></span>, 1 jam sebelum
                            acara dimulai</h4>
                    </div>
                    <div class="events-speakers-grid" id="event_speakers">
                    </div>
                    <div class="event-description effect-pop-slide-r">
                        <h4>- Description -</h4>
                        <p id="event_detail"></p>
                    </div>
                </div>
                <div class="event-form-section"><iframe id="event_form" width="100%" height="677" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe></div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        var load = 0;
        document.getElementById('event_form').onload = function(){
            load++;
            console.log(load);
            if(load>2){
                window.open("https://t.me/+6fn52_-GVrI3MDE1","_blank");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../../../api/events/read/{{ request()->route('id') }}",
                success: function(result) {
                    var eventItems = '';
                    var eventSpeakers = '';
                    if (result.length === 0) {
                    } else {

                        $('#event_title').append(result[0]["title"]);
                        $('#event_image_blur').append(
                            `<img src="../../storage/img/events/${result[0]["id"]}/${result[0]["picture"]}" alt="">`
                        );
                        $('#event_image').attr("src",
                            `../../storage/img/events/${result[0]["id"]}/${result[0]["picture"]}`
                        );
                        $('.event_date').each(function() {
                            $(this).append(result[0]["date"]);
                        });
                        $('#event_detail').append(result[0]["detail"]);
                        $('#event_form').attr("src" ,result[0]["form_link"]);


                        result[1].forEach((speaker) => {
                            eventSpeakers +=
                            `<div class="custom-card" data-aos="fade-up" data-aos-delay="30" data-aos-duration="2000">
                                <div class="img__card-container">
                                    <img src="../../storage/img/speakers/${speaker["id"]}/${speaker["picture"]}"
                                        class="card__image" alt="Speaker" />
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
                            </div>`;
                        })
                        $("#event_speakers").append(eventSpeakers)
                    }
                }
            });
        })
    </script>
@endsection
