<!--
 /**
 * Thrust: The Audit Management Tool
 * 
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v1.0
 */
 -->
<!-- Script to put CSS on body and hide the left Nav Menu-->
<script>
    $(document).ready(function(){
        $("body").css({"background-image": "url(\"/<?php echo $root?>/img/wall-1.jpg\")", "background-repeat": "no-repeat", "background-size" : "100%"});
        $("#menu-toggle").trigger( "click" );
        $("#card").flip({
            trigger: 'manual'
        });
        $("#forgot-anchor").click(function() {
            $("#card").flip(true);
        });
        $("#login-anchor").click(function() {
            $("#card").flip(false);
        });
    });
</script>
<!-- / Script -->
<div id="card">
    <div class="container hidden- front" style="margin-top:40px; margin-left: 100px">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-login">
                        <strong> Sign in to continue</strong>
                    </div>
                    <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="center-block">
                                        <img class="profile-img"
                                             src="/<?php echo $root?>/img/photo-bot.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        <?php echo $this->Form->create('User'); ?>
                                        <div class="form-group">
                                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span>
                                                <?php echo $this->Form->input('userid', array('label' => false,'class'=>'form-control', 'placeholder'=>'Username', 'required'=>'required', 'autofocus'));?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-lock"></i>
                                                    </span>
                                                <?php echo $this->Form->input('secret', array('label' => false,'class'=>'form-control', 'placeholder'=>'Password', 'required'=>'required', 'type'=>'password'));?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-globe"></i>
                                                </span>
                                                <?php echo $this->Form->input('team', array('label' => false,'class'=>'form-control','options'=>$teamList));?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->end(array('class'=>'btn btn-lg btn-primary btn-block', 'label'=>'Sign in'), __('Submit')); ?>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                    <div class="panel-footer panel-footer-login">
                        <a href="#" id="forgot-anchor">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->element('forgot-password-modal');?>
</div>