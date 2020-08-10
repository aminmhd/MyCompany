@extends('panel.Layout.app')

@section('header')

    <!-- Dropzone.js -->
    <link href="{{ asset('vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">

@endsection





@section('dashboard')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Picture Upload </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Dropzone multiple Picture uploader</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p></p>
                        <form action="{{ Route('upload.gallery.store') }}" method="post">
                            <div action="{{ Route('upload.gallery.store') }}" class="dropzone" style="border: 1px solid #ced4da;"></div>
                            @csrf
                            @include('panel.notification.notification')
                        <div class="ln_solid"></div>
                        <button  type="submit" class="btn btn-success">Submit</button>
                        </form>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop





@section('footer')
    <!-- Dropzone.js -->
    <script src="{{ asset('vendors/dropzone/dist/min/dropzone.min.js') }}"></script>
@stop
