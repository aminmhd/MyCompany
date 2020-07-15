@extends('home.Layout.home')

@section('content')

    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" action="">
                        @csrf
                        <h1>Login Form</h1>
                        <div>
                            <input name="user_email" type="email" class="form-control" placeholder="Email" required="required" />
                        </div>
                        <div>
                            <input name="user_password" type="password" class="form-control" placeholder="Password" required="required" />
                        </div>
                        <div>
                           <button type="submit" class="btn btn-success">Login</button>
                          {{--  <a class="reset_pass" href="#">Lost your password?</a>--}}
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>Gardiom</h1>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            @include('home.auth.register')
        </div>
    </div>

@endsection
