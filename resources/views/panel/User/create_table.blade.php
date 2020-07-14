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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created-At</th>
                                        <th>Updated-At</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    @if( $users_created && count($users_created) > 0 )
                                        <tbody>
                                        @foreach($users_created as $user)
                                            <tr>

                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->Role }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>
                                                <td> @include('panel.User.operation' , $user) </td>
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
