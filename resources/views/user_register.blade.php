<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>XAU | Register</title>

    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Đăng ký tài khoản</h1>
                            <p class="lead">
                                Nhập đầy đủ các thông tin sau
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        @php
                                        if (Session::has('error')) {
                                            echo '<span style="color: red">'.Session::get('error').'</span>';
                                        }
                                        @endphp
                                    </div>
                                    <form action="{{ URL::to('check-register') }}" method="post">
                                        {{ csrf_field() }}
                                        <div>
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                placeholder="Nhập email của bạn" required/>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <label class="form-label">Họ tên</label>
                                            <input class="form-control form-control-lg" type="text" name="name"
                                                placeholder="Nhập tên của bạn" required/>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <label class="form-label">Mật khẩu</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Nhập mật khẩu của bạn" required/>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <label class="form-label">Nhập lại mật khẩu</label>
                                            <input class="form-control form-control-lg" type="password" name="re_password"
                                                placeholder="Nhập lại mật khẩu" required/>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ 'backend/js/app.js' }}"></script>

</body>

</html>
