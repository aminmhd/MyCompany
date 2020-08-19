<div class="slim_modal" id="{{$item}}">
    <div class="sm_content">
        <div class="sm_header">Hi. I'm a Header.</div>
        <div class="sm_icon_menu">
            <ul>
                <li class="sm_close"><i class="fa fa-times fa-fw "></i></li>
                <li><a href="{{ Route('app.gallery.edit', $images->image_id) }}"><i class="fa fa-edit fa-fw"></i></a>
                </li>
                <li><a href="{{ Route('app.image.download' , $images->image_id) }}"><i
                            class="fa fa-download fa-fw"></i></a></li>
            </ul>
        </div>
        <div class="sm_content_inner_wrap">
            <div class="sm_area_top">
                <img src="{{ asset('images/'.$images->image_name) }}" alt="" style="height: 250px;width: 250px">
            </div>
            <div class="sm_area_bottom">
                <div style="font-size: 20px;font-weight: bold">
{{--
                    @if(!empty($images->edit))
                        @foreach($images->edit->get() as $e)
                            Address: {{   $e->edit_image_address  }}
                            <br>
                            Phone
                            Number:  {{   $e->edit_image_phone  }}
                            <br>
                            Explain:  {{   $e->edit_image_explain  }}
                            <br>
                        @endforeach
                    @endif--}}
                </div>
            </div>
            <div class="sm_close sm_close_button">CLOSE</div>
        </div>
    </div>
</div>

