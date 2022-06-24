<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Edufest</title>
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

<body class="bg-gradient-primary" style="background: #67589d;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10" style="width: 80vw;max-width: 600px;">
                <div class="card shadow-lg o-hidden border-0 my-5" style="border-radius: 20px;">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>

                                    <form class="user" id="login__form" method="POST">
                                        <div class="mb-3"><input class="form-control form-control-user" type="email" id="email__login" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="email__password" placeholder="Password" name="password" required></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #67589d;border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;">
                                            Login
                                        </button>
                                        <hr>
                                    </form>

                                    <div class="text-center">
                                        {{-- <a class="small" href="forgot-password.html">
                                            Forgot Password?
                                        </a></div> --}}
                                    <div class="text-center"><a class="small" href="{{ route('register') }}">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="unauthModal" tabindex="-1" aria-labelledby="unauthModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="body_unauth_msg">
                </div>
                <div class="modal-footer">
                    <button type="button" id="unauthRegist" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/admin-template/js/script.min.js"></script>
    <script>
        $("#login__form").submit(function(e) {

            e.preventDefault();
            var form = $("#login__form");
            $.ajax({
                type: "POST",
                url: '../../api/auth/login',
                data: form.serialize(),
                success: function(data)
                {
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#body_unauth_msg").html('');
                    var data=XMLHttpRequest.responseText;
                    var jsonResponse = JSON.parse(data);
                    $("#body_unauth_msg").append(jsonResponse["message"]);
                    $('#unauthModal').modal('show');
                }
            });
        });
    </script>
</body>

</html>
