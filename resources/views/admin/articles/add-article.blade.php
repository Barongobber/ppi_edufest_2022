<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New Article - Edufest</title>
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
                    <h3 class="text-dark mb-4">New Article</h3>
                    <form id="article_form" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-body text-center shadow">
                                        <div id="before__img"></div>
                                        <div class="my-3 mx-5">
                                            <label for="formFile" class="form-label">Add File</label>
                                            <input class="form-control" type="file" accept="application/pdf" name="picture"
                                                id="form__img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Article Detail</p>
                                            </div>
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="article_writter"><strong>Writer</strong><br></label><input
                                                                class="form-control" type="text" id="article_writer"
                                                                placeholder="Writer Name" name="name"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><label class="form-label"
                                                        for="article_title"><strong>Title</strong></label>
                                                    <input class="form-control" type="text" id="article_title"
                                                        placeholder="Title" name="detail" rows="3">
                                                </div>
                                                <div class="mb-3"><label class="form-label"
                                                        for="article_description"><strong>Description</strong></label>
                                                    <textarea class="form-control" type="text"
                                                        id="article_description" placeholder="Description" name="detail"
                                                        rows="3"></textarea>
                                                </div>
                                                <div class="mb-3"><label class="form-label"
                                                        for="article_school"><strong>School</strong></label>
                                                    <input class="form-control" type="text" id="article_school"
                                                        placeholder="Writer School" name="detail" rows="3">
                                                </div>
                                                <div class="mb-3"><label class="form-label"
                                                        for="article_ppi"><strong>PPI</strong></label>
                                                    <input class="form-control" type="text" id="article_ppi"
                                                        placeholder="Writer PPI" name="detail" rows="3">
                                                </div>

                                                <div class="mb-3"><button class="btn btn-primary btn-sm"
                                                        type="submit">Add Article</button></div>
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
    <script src="../../assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/admin-template/js/script.min.js"></script>
    <script>
        $("#article_form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('writer', $('#article_writer').val());
            formData.append('title', $('#article_title').val());
            formData.append('writer_school', $('#article_school').val());
            formData.append('writer_ppi', $('#article_ppi').val());
            formData.append('description', $('#article_description').val());
            formData.append('file', $('#form__img')[0].files[0]);
            var urlpost = '../../../api/articles/insert';
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
                    window.location.href = "{{ route('admin-article-index') }}";
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
