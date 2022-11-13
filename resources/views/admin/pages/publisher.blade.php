@extends('admin.layouts.main')
@section('title_page'){{$publisher->name}} @endsection
@section('content')

    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Books</h6>
                                    <h6 class="font-extrabold mb-0">{{$count_books}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List books</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style=" overflow-x: clip; ">
                                <div id="table_data">
                                    @include('admin.layouts.components.pagination_data_publish')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $(document).on('click', '.nav_link a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {

                $.ajax({
                    url: "/publishers/{{$publisher->id}}/fetch_data?page=" + page,
                    success: function (data) {
                        $('#table_data').html(data);
                    }
                });
                console.log('2');
            }

        });
    </script>
@endsection
