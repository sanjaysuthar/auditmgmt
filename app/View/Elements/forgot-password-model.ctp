<!--
 /**
 * Thrust: The Audit Management Tool
 *
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v2.0
 */
 -->

<div class="container hidden- back" style="margin-top:40px; margin-left: 100px">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-login">
                    <strong> Forgot Password, Send a request to Admin</strong>
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
                                <?php echo $this->Form->create('User', array('action'=>'forgotPassword')); ?>
                                <div class="form-group">
                                    <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span>
                                        <?php echo $this->Form->input('userid', array('label' => false,'class'=>'form-control', 'placeholder'=>'Username', 'required'=>'required', 'autofocus'));?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php echo $this->Form->end(array('class'=>'btn btn-lg btn-primary btn-block', 'label'=>'Send Request'), __('Submit')); ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="panel-footer panel-footer-login">
                    <a href="#" id="login-anchor">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts All custom page related scripts goes below this -->
<script type="text/javascript">
    $(function(){
        $('#forgot-password-form').on('submit', function(e){
            // Post the form using the form's action and data
            $.post($(this).attr('action'), $(this).serialize())
                // called when post has finished
                    .done(function(data) {
                        // inject returned html into page
                        $('#content-forgot').html('success');
                    })
                // called on failure
                    .fail(function(data) {
                        // Flash message already on page
                        if ($('#flashMessage').length) {
                            // Fade out flash message
                            $('#flashMessage').fadeOut('fast', function(){
                                // Remove from page
                                $(this).remove();
                                // Inject another flash message
                                $('h4').before('<div class="message" id="flashMessage">An Ajax error occured, please try again or refresh</div>');
                            });
                        } else {
                            // Inject flash message
                            $('h4').before('<div class="message" id="flashMessage">An Ajax error occured, please try again or refresh</div>');
                        }
                    });
            // return false to stop the page from posting normally
            return false;
        });
    });
</script>
<!-- / Scripts -->