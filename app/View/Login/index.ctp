<script>
    $(document).ready(function(){
        $("body").css({"background-image": "url(\"http://localhost/auditmgmt/img/wall-1.jpg\")", "background-repeat": "no-repeat", "background-size" : "100%"});
        $( "#menu-toggle" ).trigger( "click" );
    });
</script>
<div class="container" style="margin-top:40px">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-login">
                    <strong> Sign in to continue</strong>
                </div>
                <div class="panel-body">
                    <form role="form" action="#" method="POST">
                        <fieldset>
                            <div class="row">
                                <div class="center-block">
                                    <img class="profile-img"
                                         src="/auditmgmt/img/photo-bot.png" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                    <div class="form-group">
                                        <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span>
                                            <input class="form-control" placeholder="Username" name="loginname" type="text" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
                                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer panel-footer-login">
                    <a href="#" onClick=""> Forgot Password </a>
                </div>
            </div>
        </div>
    </div>
</div>