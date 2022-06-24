<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Edufest</title>
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="icon" type="image/png" sizes="292x292" href="../../../assets/icons/edufest-icon.png" />
    <link rel="stylesheet" href="assets/admin-template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spartan&amp;display=swap">
    <link rel="stylesheet" href="assets/admin-template/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/admin-template/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/admin-template/fonts/fontawesome5-overrides.min.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Favicon start -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/edufest-icon.png">
    <!-- Favicon end -->
</head>

<body class="d-md-flex justify-content-md-center bg-gradient-primary"
    style="border-color: rgb(100,151,144);background: #68c38a;">
    <div class="container d-flex d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xxl-center"
        style="max-width: 800px;">
        <div class="card shadow-lg o-hidden border-0 my-5" style="width: 80vw;max-width: 800px;border-radius: 20px;">
            <div class="card-body p-0">
                <div class="row d-xxl-flex justify-content-xxl-center">
                    <div class="col-lg-7" style="max-width: 800px;min-width: 100%;">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>

                            <form class="user" method="POST" id="regist__form" >
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Name" name="name" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Username" name="username" required></div>
                                </div>
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email" required></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="passwordInput" placeholder="Password" name="password" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="repeatPasswordInput" placeholder="Repeat Password" name="password_repeat" required></div>
                                </div>
                                <button id="submit" class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #68c38a;border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;">Register
                                    Account</button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body" id="body_success_msg">
                </div>
                <div class="modal-footer">
                    <button type="button" id="successRegist" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/admin-template/js/script.min.js"></script>
    <script>
        $(document).on('click', "#successRegist", function() {
            window.location.href = "{{ route('login') }}";
        });

        $("#regist__form").submit(function(e) {

            e.preventDefault();

            var pwInput = $('#passwordInput').val();
            var pwRepeatInput = $('#repeatPasswordInput').val();
            
            if (pwInput != pwRepeatInput) {
                alert("please enter the same confirmation password!");
            } else {
                var form = $("#regist__form");
                $.ajax({
                    type: "POST",
                    url: '../../api/admins/register',
                    data: form.serialize(),
                    success: function(data)
                    {
                        let headers = new Headers({'Content-Type': 'application/json'});
                        let token = 'Bearer '+Object.values(data);
                        headers.append('Authorization', token);
                        $("#body_success_msg").append(data["msg"]);
                        $('#successModal').modal('show');
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        var data=XMLHttpRequest.responseText;
                        var jsonResponse = JSON.parse(data);
                        alert(jsonResponse["message"]);
                    }
                });
            }
        });
    </script>
</body>

</html>
