<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Speaker - Edufest</title>
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

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Photo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input class="form-control" type="file" accept="image/*" name="picture" id="form__img">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button id="save-picture" type="button" class="btn btn-primary"
                                    data-bs-dismiss="modal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Edit Speaker</h3>
                    <form id="speaker__edit-form" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-body text-center shadow">
                                        <div id="before__img"></div>
                                        <div class="my-3 mx-5">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Update Photo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Speaker Detail</p>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="form__speaker-name"><strong>Speaker
                                                                    Name</strong><br></label><input id=""
                                                                class="form-control form-nama" type="text"
                                                                id="form__speaker-name" placeholder="Speaker Name"
                                                                name="name"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="form__speaker-email"><strong>Email</strong><br></label><input
                                                                class="form-control" type="text"
                                                                id="form__speaker-email" placeholder="Email"
                                                                name="email"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="form__speaker-ppi"><strong>PPI</strong><br></label><input
                                                                class="form-control" type="text"
                                                                id="form__speaker-ppi" placeholder="PPI Negara"
                                                                name="ppi"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="form__speaker-school"><strong>School</strong><br></label><input
                                                                class="form-control" type="text"
                                                                id="form__speaker-school" placeholder="School Name"
                                                                name="school"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="form__speaker-major"><strong>Major</strong><br></label><input
                                                                class="form-control" type="text"
                                                                id="form__speaker-major" placeholder="Major"
                                                                name="major"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="form__speaker-event"><strong>Event</strong><br></label>
                                                            <select class="form-select" id="form__speaker-event"
                                                                name="event_id">
                                                                <optgroup label="All Event" id="event__dropdown">
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><label class="form-label"
                                                        for="form__speaker-detail"><strong>Detail</strong></label>
                                                    <textarea class="form-control" type="text"
                                                        id="form__speaker-detail" placeholder="Speaker Detail"
                                                        name="detail" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3"><button id="form__btn2"
                                                        class="btn btn-primary btn-sm">Save Changes</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                    Success to update speaker.
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal_update" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/admin-template/js/script.min.js"></script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('updateModal'), {
            keyboard: false
        })
        $(document).on('click', "#modal_update", function() {
            window.location.href = "{{ route('admin-speakers-index') }}";
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
                    $.each(result, function(key, event) {
                        eventItems += '<option value="' + event["id"] + '">' + event["title"] +
                            '</option>';
                    });
                    $('#event__dropdown').after(eventItems);
                }
            });
        });
        $('#save-picture').click(function(e) {
            e.preventDefault();
            var formData = new FormData();
            var files = $('#form__img')[0].files[0];
            formData.append('picture', files);
            $.ajax({
                type: "POST",
                url: '../../../api/speakers/image/{{ request()->route('id') }}?_method=PUT',
                data: formData,
                processData: false,
                contentType: false,
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

        });
        $.ajax({
            type: 'GET',
            url: '../../../api/speakers/read/{{ request()->route('id') }}',
            success: function(speaker) {
                var img_link = '/storage/img/speakers/' + speaker[0]["id"] + '/' + speaker[0][
                    "picture"];

                $("#before__img").after(
                    '<img id="speaker__img" class="rounded-circle mb-3 mt-4" width="160" height="160" src="' +
                    img_link + '"">');
                $('.form-nama').val(speaker[0]["name"]);
                $('#form__speaker-ppi').val(speaker[0]["ppi"]);
                $('#form__speaker-email').val(speaker[1]);
                $('#form__speaker-school').val(speaker[0]["school"]);
                $('#form__speaker-major').val(speaker[0]["major"]);
                $('#form__speaker-detail').val(speaker[0]["detail"]);
                $('#form__speaker-event').val(speaker[0]["event_id"]);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                var data = XMLHttpRequest.responseText;
                var jsonResponse = JSON.parse(data);
                alert(jsonResponse["message"]), alert(textStatus);
            }
        });
        $("#form__btn2").click(function(e) {
            e.preventDefault();
            const data = {
                "name": $('.form-nama').val(),
                "ppi": $('#form__speaker-ppi').val(),
                "email": $('#form__speaker-email').val(),
                "school": $('#form__speaker-school').val(),
                "major": $('#form__speaker-major').val(),
                "detail": $('#form__speaker-detail').val(),
                "event_id": $('#form__speaker-event').val(),
            }
            $.ajax({
                type: "PUT",
                url: '../../../api/speakers/update/{{ request()->route('id') }}?_method=PUT',
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
</body>

</html>
