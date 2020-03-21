<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/admin/otika/source/light/auth-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jan 2020 05:55:33 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>New Password</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href={{ url("public/assets/css/app.min.css") }}>
  <!-- Template CSS -->
  <link rel="stylesheet" href={{ url("public/assets/css/style.css") }}>
  <link rel="stylesheet" href={{ url("public/assets/css/components.css") }}>
  <!-- Custom style CSS -->
  <link rel="stylesheet" href={{ url("public/assets/css/custom.css") }}>
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Reset Password</h4>
              </div>
              <div class="card-body">
                <p class="text-muted">Enter Your New Password</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{session('status')}}
                </div>
                
                @endif
                <form method="POST" action="{{route('changing')}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="oldPassword">Current Password</label>
                    <input id="oldPassword" type="text" class="form-control" name="oldPassword" tabindex="1" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="password">New Password <span class="text-muted">(Min 8 charactesr)</span></label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                      name="password" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm_password"
                      tabindex="2" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Change Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <!-- Custom JS File -->
  <script src={{ url("public/assets/js/custom.js") }}></script>
</body>


<!-- Mirrored from www.radixtouch.in/templates/admin/otika/source/light/auth-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jan 2020 05:55:33 GMT -->
</html>