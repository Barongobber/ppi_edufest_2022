<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New FAQ - Edufest</title>
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
                    <h3 class="text-dark mb-4">New FAQ</h3>
                    <div class="row d-flex justify-content-center mb-auto">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col" style="max-width: 725px;">
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">FAQ detail</p>
                                        </div>
                                        <div class="card-body">
                                            <form id="faq__add-form">
                                                <div class="mb-3"><label class="form-label" for="form__faq-question"><strong>Question</strong></label>
                                                        <input class="form-control" type="text" id="address" placeholder="Question" name="question">
                                                </div>
                                                <div class="mb-3"><label class="form-label" for="form__faq-answer"><strong>Answer</strong></label>
                                                        <textarea class="form-control" type="text" id="form__faq-answer" placeholder="Answer" name="answer" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm"
                                                        type="submit">Add FAQ</button></div>
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
    <script src="../../assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/admin-template/js/script.min.js"></script>
    <script>
        $("#faq__add-form").submit(function(e) {

            e.preventDefault();
            var form = $("#faq__add-form");
            $.ajax({
                type: "POST",
                url: '../../../api/faqs/insert',
                data: form.serialize(),
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer {{ Auth::user()->api_token }}');
                },
                success: function(data)
                {
                    let headers = new Headers({'Content-Type': 'application/json'});
                    let token = 'Bearer {{ Auth::user()->api_token }}';
                    headers.append('Authorization', token);
                    window.location.href = "{{ route('admin-faqs-index') }}";
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var data=XMLHttpRequest.responseText;
                    var jsonResponse = JSON.parse(data);
                    alert(jsonResponse["message"]);
                }
            });
        });
    </script>
</body>

</html>
