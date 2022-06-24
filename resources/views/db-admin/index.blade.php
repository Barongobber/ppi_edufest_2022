<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>All Access - DB Admin</title>
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

<body id="page-top" style="background: var(--bs-gray-900);">
    <div id="wrapper" style="background: var(--bs-gray-900);">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" style="background: var(--bs-gray-900);">

                @include('admin.layouts.top-nav')

                <div class="container-fluid mb-4">
                    <h3 class="text-white mb-4">All Access</h3>
                    <div class="card shadow" style="border-radius: 20px;">
                        <div class="card-header py-3"
                            style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                            <p class="text-primary m-0 fw-bold">Access Info</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            {{-- <th>Role</th> --}}
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="admins__row">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-dark sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Edufest 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../../assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/admin-template/js/script.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../../../../api/admins/readAll",
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer {{ Auth::user()->api_token }}');
                },
                success: function(data) {

                    var adminItems = '';
                    if (data.length === 0) {
                        $('#admins__row').after(
                            '<td colspan="6" class="text-center" >There is no data exist here</td>');
                    } else {
                        $.each(data, function(key, admin) {
                            if ((admin["id"]) !== {{ Auth::user()->id }}) {
                                adminItems += '<tr class="align-middle">' +
                                    '<td id="admin__name-list">' + admin["name"] + '</td>' +
                                    '<td id="admin__username-list">' + admin["username"] +
                                    '</td>' +
                                    '<td id="admin__email-list">' + admin["email"] + '</td>' +
                                    '<td id="admin__status-list">' +
                                    '<select class="form-select changeStatus" name="status" id="' +
                                    admin["id"] + '">' +
                                    '<option value="registered">Registered</option>' +
                                    '<option value="approved">Approved</option>' +
                                    '</select>' +
                                    '</td>' +
                                    '</tr>';
                            }
                        });
                        $('#admins__row').append(adminItems);
                        $('#dataTable').DataTable();
                        $.each(data, function(key, admin) {
                            $($('#' + admin["id"])).val(admin["status"]).change();
                        })
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var data = XMLHttpRequest.responseText;
                    var jsonResponse = JSON.parse(data);
                    alert(jsonResponse["message"]), alert(textStatus);
                }
            });
            $(document).on('change', 'select', function() {
                var id = $(this).attr("id");
                var urlpost = '../../../api/admins/change_status/' + id;
                $.ajax({
                    type: "PUT",
                    url: urlpost,
                    data: {
                        status: $('select#' + id).val()
                    },
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('Authorization',
                            'Bearer {{ Auth::user()->api_token }}');
                    },
                    success: function(data) {
                        // $("select#"+id).val(data.month)
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        var data = XMLHttpRequest.responseText;
                        var jsonResponse = JSON.parse(data);
                        alert(jsonResponse["message"]);
                    }
                });
            });
        });
    </script>
</body>

</html>
