<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Report - Edufest</title>
    <link rel="stylesheet" href="../../../assets/admin-template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spartan&amp;display=swap">
    <link rel="stylesheet" href="../../../assets/admin-template/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../../assets/admin-template/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/admin-template/fonts/fontawesome5-overrides.min.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Favicon start -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/icons/edufest-icon.png">
    <!-- Favicon end -->
</head>

<body id="page-top">
    <div id="wrapper">

        @include('admin.layouts.side-nav')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                @include('admin.layouts.top-nav')

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Edit Report</h3>
                    </div>
                    <div class="row d-xl-flex justify-content-xl-center">
                        <div class="col" style="max-width: 1080px">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Report Details</p>
                                </div>
                                <div class="card-body">
                                    <form id="report__add-form" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" id="form__report-title-label"
                                                        for="form__report-title"><strong>Title</strong></label><input
                                                        class="form-control" type="text" id="form__report-title"
                                                        placeholder="Title" name="title" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" id="form__report-event-name"
                                                        for="form__report-event"><strong>Event
                                                            Name</strong></label>
                                                    <select class="form-select" id="form__report-event"
                                                        name="event_id">
                                                        <optgroup label="All Event" id="event__dropdown">
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" id="form__report-url-att-label"
                                                        for="form__report-url-att">
                                                        <strong>Attendance&nbsp;URL ID</strong><br />
                                                    </label>
                                                    <input class="form-control" type="text" id="form__report-url-att"
                                                        placeholder="ID" name="url_attendance" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" id="form__report-range-att-label"
                                                        for="form__report-range-att"><strong>Attendance&nbsp;Range</strong><br /></label><input
                                                        class="form-control" type="text" id="form__report-range-att"
                                                        placeholder="Range" name="range_attendance" required />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" id="form__report-url-reg-label"
                                                        for="form__report-url-reg-1"><strong>Registrants URL
                                                            ID</strong><br /></label>
                                                    <input class="form-control" type="text"
                                                        id="form__report-url-reg-1" placeholder="ID #1"
                                                        name="urls_registrant" required />
                                                    <input class="form-control mt-2" type="text"
                                                        id="form__report-url-reg-2" placeholder="ID #2 (If any)"
                                                        name="urls_registrant" />
                                                    <input class="form-control mt-2" type="text"
                                                        id="form__report-url-reg-3" placeholder="ID #3  (If any)"
                                                        name="urls_registrant" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" id="form__report-range-reg-label"
                                                        for="form__report-range-reg-1"><strong>Registrants
                                                            Range</strong><br /></label>
                                                    <input class="form-control" type="text"
                                                        id="form__report-range-reg-1" placeholder="Range #1"
                                                        name="ranges_registrant" required />
                                                    <input class="form-control mt-2" type="text"
                                                        id="form__report-range-reg-2" placeholder="Range #2 (If any)"
                                                        name="ranges_registrant" />
                                                    <input class="form-control mt-2" type="text"
                                                        id="form__report-range-reg-3" placeholder="Range #3 (If any)"
                                                        name="ranges_registrant" />
                                                </div>
                                                <div class="d-flex justify-content-xl-end mb-3">
                                                    <a class="btn btn-primary btn-sm d-none d-sm-inline-block"
                                                        role="button" type="submit" id="submit_report_btn"><i
                                                            class="fas fa-download fa-sm text-white-50"></i>&nbsp;&nbsp;Save
                                                        and Generate Report</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Edufest 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Success to update report.
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal_update" class="btn btn-primary" >Generate Report</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/admin-template/js/script.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('updateModal'), {
            keyboard: false
        });
        $(document).on('click', "#modal_update", function() {
            window.open("../../../admin/reports/generate/{{ request()->route('id') }}", "_blank");
            window.location.href = "{{ route('admin-dashboard') }}";
        });
        $(document).ready(function() {

            $.ajax({
                type: "GET",
                url: "../../../api/events/read",
                header: {
                    "Authorization": "Bearer {{ Auth::user()->api_token }}"
                },
                success: function(events) {
                    var eventItems = '';
                    $.each(events, function(key, event) {
                        eventItems += '<option value="' + event["id"] + '">' + event["title"] +
                            '</option>';
                    });
                    $('#event__dropdown').after(eventItems);

                }
            });

            $.ajax({
                type: 'GET',
                url: '../../../api/reports/read/{{ request()->route('id') }}',
                header: {
                    "Authorization": "Bearer {{ Auth::user()->api_token }}"
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization',
                        'Bearer {{ Auth::user()->api_token }}');
                },
                success: function(report) {
                    // split registration ranges and url
                    let regURLs = report[0]["urls_registrant"]
                    let regRanges = report[0]["ranges_registrant"]

                    const regURL = regURLs.split(",");
                    const regRange = regRanges.split(",");

                    $('#form__report-title').val(report[0]["title"]);
                    $('#form__report-event').val(report[0]["event_id"]);
                    $('#form__report-url-att').val(report[0]["url_attendance"]);
                    $('#form__report-range-att').val(report[0]["range_attendance"]);
                    $('#form__report-url-reg-1').val(regURL[0]);
                    $('#form__report-range-reg-1').val(regRange[0]);
                    if (regRange[1] != undefined && regURL[1] != undefined) {
                        $('#form__report-url-reg-2').val(regURL[1]);
                        $('#form__report-url-reg-3').val(regURL[2]);
                        $('#form__report-range-reg-2').val(regRange[1]);
                        $('#form__report-range-reg-3').val(regRange[2]);
                    } else {
                        $('#form__report-url-reg-2').val(' ');
                        $('#form__report-url-reg-3').val(' ');
                        $('#form__report-range-reg-2').val(' ');
                        $('#form__report-range-reg-3').val(' ');
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var data = XMLHttpRequest.responseText;
                    var jsonResponse = JSON.parse(data);
                    alert(jsonResponse["message"]), alert(textStatus);
                }
            });
        });

        $("#submit_report_btn").click(function(e) {
            e.preventDefault();
            var formData = new FormData();
            // var urls = '';
            // var ranges = '';

            var urls = $('#form__report-url-reg-1').val();
            var ranges = $('#form__report-range-reg-1').val();
            var id_handler = $('#form__report-url-reg-2');
            var range_handler = $('form__report-range-reg-2');
            if (id_handler.val() != ' ' && range_handler.val() != ' ') {
                for (let i = 2; i <= 3; i++) {
                    urls += ',' + $('#form__report-url-reg-' + i).val()
                    ranges += ',' + $('#form__report-range-reg-' + i).val()
                }
            }
            const data = {
                "title": $('#form__report-title').val(),
                "event_id": $('#form__report-event').val(),
                "url_attendance": $('#form__report-url-att').val(),
                "range_attendance": $('#form__report-range-att').val(),
                "urls_registrant": urls,
                "ranges_registrant": ranges,
            }
            $.ajax({
                type: "PUT",
                url: '../../../api/reports/update/{{ request()->route('id') }}?_method=PUT',
                data: JSON.stringify(data),
                processData: false,
                contentType: "application/json; charset=utf-8",
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer {{ Auth::user()->api_token }}');
                },
                success: function(data) {
                    myModal.show();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var data = XMLHttpRequest.responseText;
                    var jsonResponse = JSON.parse(data);
                    alert(jsonResponse["message"]);
                }
            });
        });

    </script>

</html>
