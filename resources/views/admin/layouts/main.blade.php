<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title_page') - Library</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin-assets/css/bootstrap.css">

    <link rel="stylesheet" href="/admin-assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/admin-assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/admin-assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/admin-assets/css/app.css">
    <link rel="shortcut icon" href="/admin-assets/images/favicon.svg" type="image/x-icon">
    @yield('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body>
<div id="app">
    @include('admin.layouts.components.sidebar')

    <div id="main">
        @include('admin.layouts.components.header')

        <div class="page-heading">
            <h3>@yield('title_page')</h3>
        </div>
        <div class="page-content">

            @yield('content')

        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2022 &copy; Griz</p>
                </div>
            </div>
        </footer>
    </div>
</div>


<div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Add publisher</h5>
                <button type="button" class="close rounded-pill"
                        data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="{{route('publishers.store')}}" id="add_publisher" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                               name="name" placeholder="Name" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>City</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="email-id" class="form-control"
                                                               name="city" placeholder="City" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="contact-info" class="form-control"
                                                               name="address" placeholder="Address" required>
                                                    </div>

                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Добавить
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="success_modal" style="display: none">
                                            <div class="alert alert-success text-center">
                                                <h4 class="alert-heading text-center" id="success_text_title">Success</h4>
                                                <p class="text-center" id="success_text_sub_title">This is a success alert.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<script src="/admin-assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/admin-assets/js/bootstrap.bundle.min.js"></script>


<!-- <script src="/admin-assets/vendors/apexcharts/apexcharts.js"></script> -->
<script src="/admin-assets/js/pages/dashboard.js"></script>

<script src="/admin-assets/js/main.js"></script>


<script>
    // edit category
    $('#add_publisher').submit(function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            method: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data[0].id) {
                    console.log(data[0]);
                    $('#success_text_title').html('Success added "' + data[0].name + '"');
                    $('#success_text_sub_title').html('Your api token: ' + data[0].token);
                    $('.success_modal').show();
                    $('#new_publisher').before('<li class="submenu-item "> <a href="/publishers/' + data[0].id + ' ">' + data[0].name + '</a></li>');

                    setTimeout(function () {
                        $('.success_modal').hide();
                        $(".form-control").each(function (index) {
                            $(this).val('');
                        });


                    }, 10000);
                }
            }
        });
    });
</script>
@yield('js')

</body>

</html>
