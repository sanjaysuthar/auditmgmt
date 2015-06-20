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
<!-- Anchor link and element to be replaced in login.ctp on Forgot Password option to use this model-flash -->
<!--<a href="#" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password</a>-->
<!--<?php echo $this->element('forgot-password-model-flash');?>-->

<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Forgot Password, Send a request to your Admin.</h4>
            </div>
            <div id="content-forgot">

            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('User', array('action'=>'forgotPassword')); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('userid', array('label' => 'User name Please:','class'=>'form-control', 'placeholder'=>'Username', 'required'=>'required', 'autofocus'));?>
                    </div>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <?php echo $this->Form->end(array('class'=>'btn btn-primary', 'label'=>'Send Request'), __('Submit')); ?>
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