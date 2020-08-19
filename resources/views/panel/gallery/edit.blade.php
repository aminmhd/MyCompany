@extends('panel.Layout.app')



@section('dashboard')


    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit<small>Edit Gallery Information</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form method="post" action="" id="demo-form2" data-parsley-validate enctype="multipart/form-data"
                          class="form-horizontal form-label-left">
                        @include('panel.notification.notification')
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="blog_subject">Phone
                                Number<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="blog_subject" name="edit_phone" type="text" class="form-control"
                                       value="{{ isset($image_edit) ? old('edit_phone' , $image_edit->edit_image_phone) : '' }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="blog_subject">Text<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="blog_subject" name="edit_image_text" type="text" class="form-control"
                                       value="{{ isset($image_find) ? old('edit_image_text' ,$image_find->image_text) : '' }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="blog_Description"
                                   class="col-form-label col-md-3 col-sm-3 label-align">Address<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <label>
                                    <textarea name="edit_address" class="form-control" rows="3" cols="38"
                                              placeholder="Address">{{ isset($image_edit) ? old('edit_address' , $image_edit->edit_image_address) : '' }}</textarea>
                                </label>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="blog_Description"
                                   class="col-form-label col-md-3 col-sm-3 label-align">Explain<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <label>
                                    <textarea name="edit_explain" class="form-control" rows="4" cols="33"
                                              placeholder="Explain">{{ isset($image_edit) ? old('edit_explain' , $image_edit->edit_image_explain) : '' }}</textarea>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blog_img" class="col-form-label col-md-3 col-sm-3 label-align ">Img<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" class="" id="blog_img" name="edit_img" required="required">
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
