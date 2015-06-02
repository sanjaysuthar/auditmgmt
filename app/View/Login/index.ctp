<!--
 /**
 * Thrust: The Audit Management Tool
 * 
 * @author: SANJAY SUTHAR
 * @email:  ss2445@gmail.com
 * @version:	1.0
 * @since:	v1.0
 */
 -->
<!-- Script to put CSS on body and hide the left Nav Menu-->
<script>
    $(document).ready(function(){
        $("body").css({"background-image": "url(\"/<?php echo $root?>/img/wall-1.jpg\")", "background-repeat": "no-repeat", "background-size" : "100%"});
        $("#menu-toggle").trigger( "click" );
    });
</script>
<!-- / Script -->
<div class="container hidden-" style="margin-top:40px">
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
                                         src="/<?php echo $root?>/img/photo-bot.png" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                    <div class="form-group">
                                        <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span>
                                            <input class="form-control" placeholder="Username" name="loginname" type="text" autofocus required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
                                            <input class="form-control" placeholder="Password" name="password" type="password" value="" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-globe"></i>
												</span>
                                            <!--<input class="form-control" name="team" type="password" value="" required="required">-->
                                            <!--<label for="team">Select Team</label>-->
                                            <select class="form-control" name="team">
                                                <option>Lara Cargo</option>
                                                <option>Lara UAT</option>
                                                <option>Engine/ODI</option>
                                                <option>Setup/Treasury</option>
                                                <option>Oebs</option>
                                                <option>Diva</option>
                                            </select>
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