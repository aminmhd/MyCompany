<div class="slim_modal" id="{{$item}}">
    <div class="sm_content">
        <div class="sm_header">Hi. I'm a Header.</div>
        <div class="sm_icon_menu">
            <ul>
                <li class="sm_close"><i class="fa fa-times fa-fw "></i></li>
                <li><a href="{{ Route('app.gallery.edit', [$images->image_id]) }}"><i class="fa fa-edit fa-fw"></i></a></li>
                <li><i class="fa fa-edit fa-fw"></i></li>
            </ul>
        </div>
        <div class="sm_content_inner_wrap">
            <div class="sm_area_top">
                <img src="{{ asset('images/'.$images->image_name) }}" alt="" style="height: 250px;width: 250px">
            </div>
            <div class="sm_area_bottom">
              <div style="font-size: 20px;font-weight: bold">
                  Address:  XXXXXXX-XXXXXXX  <br>
                  Phone Number:     <br>
                  Explain:      <br>
              </div>
            </div>
            <div class="sm_close sm_close_button">CLOSE</div>
        </div>
    </div>
</div>

