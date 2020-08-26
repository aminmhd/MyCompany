@extends('panel.Layout.app')


@section('dashboard')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                   {{-- {{ dd(session('title')) }}--}}
                    <h2>User<small>{{ $title }}</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form method="post" action="" id="demo-form2" data-parsley-validate
                          class="form-horizontal form-label-left">
                        @include('panel.notification.notification')
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="user_name" type="text" id="first-name" class="form-control "
                                       value="{{ isset($user_edit) ? old('user_name' , $user_edit->name) : '' }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="email" name="user_email" type="text" class="form-control"
                                       value="{{ isset($user_edit) ? old('user_email' , $user_edit->email) : '' }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="col-form-label col-md-3 col-sm-3 label-align">Password<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="password" class="form-control" type="password" name="user_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align ">Role<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="user_role" class="form-control">
                                    <option

                                        value="1" {{ isset($user_edit) && $user_edit->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option
                                        value="2" {{ isset($user_edit) && $user_edit->role == 'Operator' ? 'selected' : '' }}>Operator</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
