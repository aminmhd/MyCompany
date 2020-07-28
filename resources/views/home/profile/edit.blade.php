@extends('panel.Layout.app')



@section('dashboard')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profile<small>Edit Profile</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form method="post" action="" id="demo-form2" data-parsley-validate enctype="multipart/form-data"
                          class="form-horizontal form-label-left">
                        @include('panel.notification.notification')
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                   for="profile_website">Website<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="profile_website" name="profile_website" type="text" class="form-control"
                                       value="{{ isset($profile_find_user) ? old('profile_website' , $profile_find_user->profile_website) : '' }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="profile_description" class="col-form-label col-md-3 col-sm-3 label-align">About
                                me<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <label>
<textarea name="profile_description" class="form-control" rows="4" cols="33"
          placeholder="Description">{{ isset($profile_find_user) ? old('profile_description' , $profile_find_user->profile_description) : '' }}</textarea>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile_img" class="col-form-label col-md-3 col-sm-3 label-align ">Image<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" class="" id="profile_img" name="profile_img" required="required">
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



@stop



