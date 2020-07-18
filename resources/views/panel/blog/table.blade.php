@extends('panel.Layout.app')

@section('dashboard')

    @include('panel.notification.notification')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Users Table</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">

                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Subject</th>
                                        <th>User</th>
                                        <th>Created-At</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    @if( $blog_created && count($blog_created) > 0 )
                                        <tbody>
                                        @foreach($blog_created as $blog)
                                            <tr>

                                                <td>{{ $blog->blog_id }}</td>
                                                <td>{{ $blog->blog_subject }}</td>
                                                <td>{{ $blog->blog_user_name }}</td>
                                                <td>{{ $blog->created_at }}</td>
                                                <td> @include('panel.blog.operation' , $blog) </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <tr>
                                            <td>empty !!!</td>
                                            <td>empty !!!</td>
                                            <td>empty !!!</td>
                                            <td>empty !!!</td>
                                            <td>empty !!!</td>
                                            <td>empty !!!</td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
