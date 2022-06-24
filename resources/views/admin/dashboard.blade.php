<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Edufest</title>
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="stylesheet" href="../assets/admin-template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spartan&amp;display=swap">
    <link rel="stylesheet" href="../assets/admin-template/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/admin-template/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../assets/admin-template/fonts/fontawesome5-overrides.min.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Favicon start -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icons/edufest-icon.png">
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
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <div class="row d-xl-flex justify-content-xl-center">
                        <div class="col" style="max-width: 1080px">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Report Form</p>
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

                    <div class="row my-5">
                        <div class="col">
                            <div class="card shadow" style="border-radius: 20px;">
                                <div class="card-header py-3"
                                    style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                                    <p class="text-primary m-0 fw-bold">Reports</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table mt-2" role="grid"
                                        aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTableReports">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Event Name</th>
                                                    <th class="d-flex justify-content-end">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="reports__row">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow" style="border-radius: 20px;">
                                <div class="card-header py-3"
                                    style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                                    <p class="text-primary m-0 fw-bold">Event List</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table mt-2" role="grid"
                                        aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTableEvents">
                                            <thead>
                                                <tr>
                                                    <th>Poster</th>
                                                    <th>Title</th>
                                                    <th>Region</th>
                                                    <th>Date</th>
                                                    <th>Detail</th>
                                                    <th>Form Link</th>
                                                </tr>
                                            </thead>
                                            <tbody id="events__row">

                                            </tbody>
                                        </table>
                                    </div>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this report?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="modal_delete" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/admin-template/js/script.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script>
        // get modal element
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        });
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../../../api/events/read",
                header: {
                    "Authorization": "Bearer {{ Auth::user()->api_token }}"
                },
                success: function(result) {

                    var eventItems = '';
                    if (result.length === 0) {
                        $('#events__row').after(
                            '<td colspan="6" class="text-center" >There is no data exist here</td>');
                    } else {
                        $.each(result, function(key, event) {

                            var region = '';
                            switch (event["region"]) {
                                case 'timtengka':
                                    region = "Timur Tengah dan Afrika";
                                    break;
                                case 'amerop':
                                    region = "Amerika dan Eropa";
                                    break;
                                case 'asia_oseania':
                                    region = "Asia dan Oseania";
                                    break;
                                case 'all_region':
                                    region = "All Region";
                                    break;
                            }
                            eventItems += '<tr class="align-middle">' +
                                '<td><img class="me-2" width="150" height="150" src="../../storage/img/events/' +
                                event["id"] + '/' + event["picture"] + '">' +
                                '</td>' +
                                '<td id="event__region-crud">' + event["title"] + '</td>' +
                                '<td id="event__region-crud">' + region + '</td>' +
                                '<td id="event__date-crud">' + event["date"] + '</td>' +
                                '<td id="event__detail-crud">' + event["detail"] + '</td>' +
                                '<td><a style="background-color:#858796!important;" class="btn btn-secondary btn-icon-split" role="button" href="' +
                                event["form_link"] +
                                '" target="_blank"><span class="text-white-50 icon"><i class="fas fa-share-square" style="color: rgb(255,255,255);"></i></span><span class="text-white text">Form</span></a></td></tr>';
                        });
                        $('#events__row').append(eventItems);
                        $('#dataTableEvents').DataTable();
                    }
                }
            });
            $.ajax({
                type: "GET",
                url: "../../../api/events/read",
                header: {
                    "Authorization": "Bearer {{ Auth::user()->api_token }}"
                },
                success: function(events) {
                    $.ajax({
                        type: "GET",
                        url: "../../../api/reports/read",
                        header: {
                            "Authorization": "Bearer {{ Auth::user()->api_token }}"
                        },
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization',
                                'Bearer {{ Auth::user()->api_token }}');
                        },
                        success: function(reports) {
                            var reportItems = '';
                            if (reports.length === 0) {
                                $('#reports__row').after(
                                    '<td colspan="6" class="text-center" >There is no data exist here</td>'
                                    );
                            } else {
                                $.each(reports, function(key, report) {
                                $.each(events, function(key, event) {
                                    if(report["event_id"] == event["id"]){

                                        reportItems +=
                                            '<tr class="align-middle">' +
                                            '<td class="report__title-table">' + report["title"] + '</td>' +
                                            '<td class="report__event-table">' + event["title"] + '</td>' +
                                            '<td class="d-flex justify-content-end">'+
                                                '<a class="btn btn-success btn-circle ms-1" role="button" href="../../admin/reports/edit/'+report["id"]+'">'+
                                                    '<i class="fas fa-edit text-white"></i>'+
                                                '</a>'+
                                                '<a class="btn btn-warning btn-circle ms-1 generate-btn-report" role="button" href="../../admin/reports/generate/'+report["id"]+'" target="_blank"  id="'+report["id"]+'">'+
                                                    '<i class="fas fa-download text-white"></i>'+
                                                '</a>'+
                                                '<a class="btn btn-danger btn-circle ms-1 delete-btn-report" role="button" id="'+report["id"]+'">'+
                                                    '<i class="fas fa-trash text-white"></i>'+
                                                '</a>'+
                                                '</td></tr>';
                                            }
                                        });
                                    });
                                    $('#reports__row').append(reportItems);
                                    $('#dataTableReports').DataTable();
                            }
                        }

                    });
                }
            });
            $.ajax({
                type: "GET",
                url: "../../../api/events/read",
                header: {
                    "Authorization": "Bearer {{ Auth::user()->api_token }}"
                },
                success: function(result) {

                    var eventItems = '';
                    $.each(result, function(key, event) {
                        eventItems += '<option value="' + event["id"] + '">' + event["title"] +
                            '</option>';
                    });
                    $('#event__dropdown').after(eventItems);
                }
            });
        });
        $("#submit_report_btn").click(function(e) {

            e.preventDefault();
            var formData = new FormData();
            var urls = '';
            var ranges = ''
            formData.append('title', $('#form__report-title').val());
            formData.append('event_id', $('#form__report-event').val());
            formData.append('url_attendance', $('#form__report-url-att').val());
            formData.append('range_attendance', $('#form__report-range-att').val());

            urls += $('#form__report-url-reg-1').val();
            ranges += $('#form__report-range-reg-1').val();
            var id_handler = $('#form__report-url-reg-2');
            var range_handler = $('form__report-range-reg-2');
            if (id_handler.val() != '' && range_handler.val() != '') {
                for (let i = 2; i <= 3; i++) {
                    urls += ',' + $('#form__report-url-reg-' + i).val()
                    ranges += ',' + $('#form__report-range-reg-' + i).val()
                }
            }
            formData.append('urls_registrant', urls);
            formData.append('ranges_registrant', ranges);
            // console.log(urls);

            var urlpost = '../../../api/reports/insert';
            $.ajax({
                type: "POST",
                url: urlpost,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer {{ Auth::user()->api_token }}');
                },
                success: function(data) {
                    window.open("../../../admin/reports/generate/"+data["id"], "_blank");
                    window.location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var data = XMLHttpRequest.responseText;
                    var jsonResponse = JSON.parse(data);
                    alert(jsonResponse["message"]);
                }
            });
        });
        $(document).on('click', ".delete-btn-report", function() {
            var del_id = $(this).attr('id');
            myModal.show();
            $("#modal_delete").attr("delete-id", del_id);
        });
        $(document).on('click', "#modal_delete", function() {
            let del_id = $(this).attr('delete-id');

            $.ajax({
                type: "DELETE",
                url: '../../../api/reports/delete/' + del_id,
                data: 'id=' + del_id,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer {{ Auth::user()->api_token }}');
                },
                success: function(data) {
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var data = XMLHttpRequest.responseText;
                    var jsonResponse = JSON.parse(data);
                    alert(jsonResponse["message"]);
                }
            });
            myModal.hide();
        });
    </script>
</body>

</html>
