<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Profile</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-8 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-start mb-3">User Profile</h3>
                            <div class="profile-info">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <p>{{ auth()->user()->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <p>{{ auth()->user()->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label>NIK:</label>
                                    <p>{{ auth()->user()->nik }}</p> <!-- Ganti dengan field yang sesuai -->
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth:</label>
                                    <p>{{ auth()->user()->date_of_birth }}</p> <!-- Ganti dengan field yang sesuai -->
                                </div>
                                <div class="form-group">
                                    <label>Address:</label>
                                    <p>{{ auth()->user()->address }}</p> <!-- Ganti dengan field yang sesuai -->
                                </div>
                            </div>
                            <div class="text-center d-grid gap-2">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>
</html>
