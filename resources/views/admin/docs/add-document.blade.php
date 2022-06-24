<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Document Upload - Edufest</title>
    <link rel="stylesheet" href="../../assets/admin-template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spartan&amp;display=swap">
    <link rel="stylesheet" href="../../assets/admin-template/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/admin-template/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/admin-template/fonts/fontawesome5-overrides.min.css">
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
                    <h3 class="text-dark mb-4">Upload Documentation</h3>
                    <div class="row d-flex justify-content-center mb-3">
                        <div class="col-lg-8" style="width: 90%">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Upload File</p>
                                        </div>
                                        <div class="card-body">


                                            <div class="row">
                                                <div class="col">
                                                    <div class="container-xxl border" style="height: 50vh;">
                                                        <iframe style="width: 100%; height:100%;" id="driveFrame"
                                                            class="drive-frame"
                                                            src="https://googledriveembedder.collegefam.com/?key=AIzaSyAW730mQwTrCsypb9vYL4Bp-bRlz8kdzVs&folderid=14OJKxStmA43brh8UT6yvWI1FDgcviu53"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label"
                                                            for="form__documentation-email"><strong>Upload
                                                                File</strong><br></label></div>
                                                </div>
                                            </div>
                                            <form id="document-upload-form" method="post" enctype="multipart/form-data">

                                                <div class="row mt-3">
                                                    <div class="col-lg-8">
                                                        <div class="mb-3">
                                                            <select class="form-select" id="folder-selection"
                                                                name="folder">
                                                                <optgroup label="All Folder" id="folder-dropdown">
                                                                    <option value="">Root Folder</option>
                                                                    <option value="1Eie1mJIhpwsx7iSryFEkXwx_h3aoLS6-">Chapter 1</option>
                                                                    <option value="1ebcjxbqb7lG4zDQP8uwuBoU689yw7Z6e">Chapter 2</option>
                                                                    <option value="1y0aa_8l9dpvntDpQaufNg6W-35Orv4i6">Chapter 3</option>
                                                                    <option value="1Ee_gy1lYS1jS-visO2DTDs1MR6qcc7Gy">Chapter 4</option>
                                                                    <option value="1MLUwPENbn0iyGAwvydzX6rj0NFDWz6iR">Chapter 5</option>
                                                                    <option value="1tjuRoh1dVokZ_11S2quR6tE_kOgeqDBq">Chapter 6</option>
                                                                    <option value="1MfbzfrS1R2tcxtYDjptHkszicRMXf6S2">Chapter 7</option>
                                                                    <option value="1nH4div1Em3955I7jXE5tbw83waCC5YVI">Chapter 8</option>
                                                                    <option value="1hP9Py6aeSky23P1EGNQeonh40wzA71CU">Inspirational Series 1</option>
                                                                    <option value="1QVD_W7BGXeVCSYPHDZaEcOZri0mF3bfA">Inspirational Series 2</option>
                                                                    <option value="1F1My_HpwTdE6KuU_jD05VR3KeAoujexT">Inspirational Series 3</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <input id="docs-file" class="form-control" type="file"
                                                            name="files" multiple />
                                                    </div>
                                                    <div class="col">
                                                        <button class="btn btn-primary btn-sm" type="submit"
                                                            id="upload-file">Upload</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
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
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Upload</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" id="modal_update" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/admin-template/js/script.min.js"></script>
    <script>
        $("#document-upload-form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData();
            var input = $('#docs-file');
            for(var i = 0; i<input.get(0).files.length; i++){
                var files = $('#docs-file')[0].files[i];
                formData.append('files[]', files);
            }

            formData.append('folder', $('#folder-selection').val());

            var urlpost = "../../../api/document/upload";
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
                    $(".modal-body").html(data["response"]);
                    myModal.show();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var data = XMLHttpRequest.responseText;
                    var jsonResponse = JSON.parse(data);
                    alert(jsonResponse["message"]);
                }
            });
        });
        var myModal = new bootstrap.Modal(document.getElementById('updateModal'), {
            keyboard: false
        });
    </script>
</body>

</html>
