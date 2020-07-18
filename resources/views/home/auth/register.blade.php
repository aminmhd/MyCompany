

    <div id="register" class="animate form registration_form">
        <section class="login_content">
            <form method="post" action="{{ Route('app.home.register') }}">
                @csrf
                <h1>Create Account</h1>
                <div>
                    <input name="user_name" type="text" class="form-control" placeholder="Name" required="required"/>
                </div>
                <div>
                    <input name="user_email" type="email" class="form-control" placeholder="Email" required="required"/>
                </div>
                <div>
                    <input name="user_password" type="password" class="form-control" placeholder="Password" required="required"/>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Register</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Already a member ?
                        <a href="#signin" class="to_register"> Log in </a>
                    </p>

                    <div class="clearfix"></div>
                    <br/>

                    <div>
                        <h1>Gardiom</h1>

                    </div>
                </div>
            </form>
        </section>
    </div>

