@extends('panel.Layout.app')


@section('header')
    <!-- Custom styling plus plugins -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
    {{--//modal--}}
    <link href="{{ asset('modals/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('modals/scss/style.css') }}" rel="stylesheet">
@stop
@section('dashboard')
    <style>

    </style>

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Media Gallery <small> gallery design</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            @if($image_find && count($image_find)>0)
                                @foreach($image_find as $item => $images)
                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img style="width: 100%; display: block;height: 100%"
                                                     src="{{ asset('images/'.$images->image_name) }}" alt="image"/>
                                                <div class="mask">
                                                    {{-- <p>Your Text</p>--}}
                                                    <div class="tools tools-bottom">
                                                        {{--<a href="#"><i class="fa fa-link"></i></a>--}}
                                                        <a class="sm_open" data-modal="{{$item}}"
                                                           data-effect="pushup" data-icons="is_right"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="{{ Route('app.gallery.delete' , [$images->image_id]) }}"><i
                                                                class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <p>{{ $images->image_text }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @include('panel.notification.modal' ,$images)
                                    {{--/////////////////////modal--}}
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('footer')

    <script src="{{ asset('modals/js/index.js') }}"></script>
@stop


