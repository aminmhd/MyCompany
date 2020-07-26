@extends('panel.Layout.app')

@section('header')
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@endsection

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
                                <input id="profile_website" name="profile_website" type="text" class="form-control">
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
          placeholder="Description"></textarea>
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
                        <div class="form-group row">
                            <label for="profile_skill" class="col-form-label col-md-3 col-sm-3 label-align ">Skills<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="profile_skill" name="profile_skill[]" class="js-example-responsive"
                                        multiple="multiple" style="width: 75%">
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
            width: 'resolve',
            theme: 'classic',
            tags: true,
            tokenSeparators: [',', ' ']
        });
    </script>

@endsection
