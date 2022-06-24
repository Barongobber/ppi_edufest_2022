<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Articles - Edufest</title>
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
    <link rel="stylesheet" href="../assets/admin-template/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <h3 class="text-dark mb-4">Articles</h3>
                    <a class="btn btn-info btn-icon-split" role="button" style="margin-bottom: 15px;"
                        href="{{ route('admin-article-add') }}"><span class="text-white-50 icon"><i
                                class="fas fa-plus" style="color: rgb(255,255,255);"></i></span>
                        <span class="text-white text">New Article</span></a>
                    <div class="card shadow" style="border-radius: 20px;">
                        <div class="card-header py-3"
                            style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                            <p class="text-primary m-0 fw-bold">Article Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row d-none">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label class="form-label">Show&nbsp;<select
                                                class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label
                                            class="form-label"><input type="search"
                                                class="form-control form-control-sm" aria-controls="dataTable"
                                                placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>File</th>
                                            <th>Writer</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Writer School</th>
                                            <th>Writer PPI</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="articles__row">

                                    </tbody>
                                </table>
                            </div>

                            <div class="row d-none">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#"
                                                    aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#"
                                                    aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="article_image">

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
                    Are you sure want to delete this article?
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
    <script>
        // get modal element
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        });
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../../../api/articles/read",
                header: {
                    "Authorization": "Bearer {{ Auth::user()->api_token }}"
                },
                success: function(result) {
                    var items = '';
                    if (result.length === 0) {
                        $('#articles__row').after(
                            '<td colspan="6" class="text-center" >There is no data exist here</td>');
                    } else {
                        $.each(result, function(key, article) {
                            let img_link = '/storage/img/articles/' + article["id"] + '/' +
                                article["file"];
                            items += '<tr>' +
                                '<td style="width:150px !important; height:150px !important;" class="w-25 h-25 article_picture">' +
                                    '<iframe class="mx-auto" src="{{ url('/storage/file/articles/') }}/' +
                                article["id"] +
                                '/' +
                                article["file"] + '" allow="autoplay"></iframe>' +
                                '</td>' +
                                '<td class="align-middle" id="article__region-crud">' + article[
                                    "writer"] + '</td>' +
                                '<td class="align-middle" id="article__detail-crud">' + article[
                                    "title"] +
                                '<td class="align-middle" id="article__writer-crud">' + article[
                                    "description"] + '</td>' +
                                '</td>' +
                                '<td class="align-middle" id="article__school-crud">' + article[
                                    "writer_school"] +
                                '</td>' +
                                '<td class="align-middle" id="article__ppi-crud">' + article[
                                    "writer_ppi"] +
                                '</td>' +
                                '<td class="align-middle" >' +
                                '<a style="background-color:#1cc88a!important;" class="btn btn-success btn-circle ms-1" role="button" id="article__edit" href="../../admin/articles/edit/' +
                                article["id"] + '"><i class="fas fa-edit text-white"></i></a>' +
                                '<a style="background-color:#e74a3b!important;" class="btn btn-danger btn-circle ms-1 delete-btn-article" role="button" id="' +
                                article["id"] +
                                '"><i class="fas fa-trash text-white"></i></a>' +
                                '</td>' +
                                '</tr>';
                        });
                        $('#articles__row').append(items);
                    }
                }
            });
        });

        $(document).on('click', ".delete-btn-article", function() {

            var del_id = $(this).attr('id');

            myModal.show();

            $("#modal_delete").attr("delete-id", del_id);


        });

        $(document).on('click', "#modal_delete", function() {
            let del_id = $(this).attr('delete-id');

            $.ajax({
                type: "DELETE",
                url: '../../../api/articles/delete/' + del_id,
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
