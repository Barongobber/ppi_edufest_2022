<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Partners - Edufest</title>
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
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
                    <h3 class="text-dark mb-4">Partners</h3>
                    <a class="btn btn-info btn-icon-split" role="button" style="margin-bottom: 15px;"
                        href="{{ route('admin-partner-add') }}"><span class="text-white-50 icon"><i
                                class="fas fa-plus" style="color: rgb(255,255,255);"></i></span>
                        <span class="text-white text">New Partner</span></a>
                    <div class="card shadow" style="border-radius: 20px;">
                        <div class="card-header py-3"
                            style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                            <p class="text-primary m-0 fw-bold">Partner Info</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="partners__row">

                                    </tbody>
                                </table>
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
                    Are you sure want to delete this partner?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="modal_delete" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/admin-template/js/script.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        // get modal element
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        });

        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../../../api/partners/read",
                header: {
                    "Authorization": "Bearer {{ Auth::user()->api_token }}"
                },
                success: function(result) {

                    var partnerItems = '';

                    if (result.length === 0) {
                        $('#partners__row').after(
                            '<td colspan="4" class="text-center" >There is no data exist here</td>');
                    } else {
                        $.each(result, function(key, partner) {
                            partnerItems += '<tr class="align-middle">' +
                                '<td><img class="me-2" width="150" height="150" src="../../storage/img/partners/' +
                                partner["id"] + '/' + partner["picture"] + '"></td>' +
                                '<td id="partner__region-crud">' + partner["name"] + '</td>' +
                                '<td>' +
                                '<a style="background-color:#1cc88a!important;" class="btn btn-success btn-circle ms-1" role="button" id="partner__edit" href="../../admin/partners/edit/' +
                                partner["id"] + '"><i class="fas fa-edit text-white"></i></a>' +
                                '<a style="background-color:#e74a3b!important;" class="btn btn-danger btn-circle ms-1 delete-btn-partner" role="button" id="' +
                                partner["id"] +
                                '"><i class="fas fa-trash text-white"></i></a>' +
                                '</td>' +
                                '</tr>';
                        });
                        $('#partners__row').append(partnerItems);
                        $('#dataTable').DataTable();
                    }
                }
            });
        });

        $(document).on('click', ".delete-btn-partner", function() {
            var del_id = $(this).attr('id');
            myModal.show();
            $("#modal_delete").attr("delete-id", del_id);
        });

        $(document).on('click', "#modal_delete", function() {
            let del_id = $(this).attr('delete-id');

            $.ajax({
                type: "DELETE",
                url: '../../../api/partners/delete/' + del_id,
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
