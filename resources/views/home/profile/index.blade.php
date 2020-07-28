@extends('panel.Layout.app')

@section('header')
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@endsection

@section('dashboard')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User Report <small>Activity report</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    {{--/////////////////////////////////////////////////////////////////////--}}
                                    <img class="img-responsive avatar-view"
                                         src="{{ asset('production/images/picture.jpg') }}" alt="Avatar"
                                         title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{ $user_find_query->name }}</h3>

                            <ul class="list-unstyled user_data">
                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                </li>
                            </ul>

                            <a href="{{ Route('app.home.edit.profile') }}" class="btn btn-success"><i
                                    class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br/>

                            <!-- start skills -->
                            <h4>Skills</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    {{--//////////////////////////////////////////////////////////////////////////////--}}
                                    <p>Web Applications</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             data-transitiongoal="50"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Website Design</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             data-transitiongoal="70"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Automation & Testing</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             data-transitiongoal="30"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>UI / UX</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             data-transitiongoal="50"></div>
                                    </div>
                                </li>
                            </ul>
                            <!-- end of skills -->

                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                                                              role="tab" data-toggle="tab"
                                                                              aria-expanded="true">Notification</a>
                                    </li>
                                    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                                                        data-toggle="tab" aria-expanded="false">Message</a>
                                    </li>
                                    @endif
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab"
                                                                        id="profile-tab2" data-toggle="tab"
                                                                        aria-expanded="false">About Me</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active " id="tab_content1"
                                         aria-labelledby="home-tab">

                                        <!-- start recent activity -->
                                        <ul class="messages">
                                            {{--/////////////////////////////////////////////////////////////////////////--}}
                                            <li>
                                                <img src="{{ asset('build/images/amin.jpg') }}" class="avatar"
                                                     alt="Avatar">
                                                <div class="message_date">
                                                    <h3 class="date text-info">24</h3>
                                                    <p class="month">May</p>
                                                </div>
                                                <div class="message_wrapper">
                                                    <h4 class="heading">Desmond Davison</h4>
                                                    <blockquote class="message">Raw denim you probably haven't heard of
                                                        them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher
                                                        retro keffiyeh dreamcatcher synth.
                                                    </blockquote>
                                                    <br/>
                                                    <p class="url">
                                                        <span class="fs1 text-info" aria-hidden="true"
                                                              data-icon=""></span>
                                                     {{--   <a href="#"><i class="fa fa-paperclip"></i> User Acceptance
                                                            Test.doc </a>--}}
                                                    </p>
                                                </div>
                                            </li>
                                         {{--///////////////////////////////////////////////////////////////////////////////////////////////--}}
                                        </ul>
                                        <!-- end recent activity -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                         aria-labelledby="profile-tab">
                                        <!-- start user projects -->
                                        <form method="post" action="{{ Route('app.home.message.profile') }}" class="form-horizontal form-label-left">
                                            @include('panel.notification.notification')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="profile_skill" class="col-form-label col-md-3 col-sm-3 label-align ">Skills<span
                                                        class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <select class="form-control js-example-responsive" name="admin_user_select[]" multiple="multiple" style="width: 75%;border: 1px solid #ced4da;">
                                                        @if($all_users && count($all_users) > 0)
                                                            @foreach($all_users as $all_user)
                                                                <option value="{{ $all_user->id }}">{{ $all_user->name.'/'.''.$all_user->id }}</option>
                                                            @endforeach
                                                            @else
                                                            <option>empty!!!</option>
                                                            @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label for="Description"
                                                       class="col-form-label col-md-3 col-sm-3 label-align">Message<span
                                                        class="required">*</span>
                                                </label>

                                                <div class="col-md-6 col-sm-7 ">
                                                    <label>
<textarea id="Description" name="admin_message" class="form-control" rows="4" cols="70"
          placeholder="Message"></textarea>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="item form-group">
                                                <div class="col-md-6 col-sm-6 offset-md-3">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- end user projects -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                         aria-labelledby="profile-tab">
                                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                                            coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next
                                            level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                            photo booth letterpress, commodo enim craft beer mlkshk </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop


@section('footer')
    <!-- Select2 -->
    <script src="{{ asset('vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <tester id="tags_1_tag_autosize_tester"
            style="position: absolute; top: -9999px; left: -9999px; width: auto; font-size: 13px; font-family: helvetica,serif; font-weight: 400; letter-spacing: 0px; white-space: nowrap;">
    </tester>
    <div class="autocomplete-suggestions"
         style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
<script>
    $(".js-example-responsive").select2({
        width: 'resolve' // need to override the changed default
    });
</script>

@endsection
