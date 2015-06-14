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
<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <b>Change Password</b>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <!-- Panel Body -->
        <div class="col-md-12">
            <?php echo $this->Form->create('User'); ?>
            <?php echo $this->Form->input('id');?>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('userid', array('label' => 'User ID<span class="mandatory">*</span>', 'class'=>'form-control', 'placeholder'=>'Ex: Lara Cargo', 'readonly'=>true));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('name', array('label' => 'Name<span class="mandatory">*</span>', 'class'=>'form-control', 'placeholder'=>'Ex: Lara Cargo', 'readonly'=>true));?>
                </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('secretcurrent', array('label' => 'Current Password<span class="mandatory">*</span>', 'class'=>'form-control', 'type'=>'password', 'placeholder'=>'Ex: Password'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('secret', array('label' => 'New Password<span class="mandatory">*</span>', 'class'=>'form-control', 'type'=>'password', 'placeholder'=>'Ex: Password'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('secretrep', array('label' => 'Confirm New Password<span class="mandatory">*</span>', 'class'=>'form-control', 'type'=>'password', 'placeholder'=>'Ex: Password'));?>
                </div>

                <br>
                <?php echo $this->Form->end(array('label'=>'Reset Password!!', 'class'=>'btn btn-success pull-right', 'id'=>'resetPassword')); ?>
            </div>
        </div>
        <!-- / Panel Body -->
    </div>
</div>
<!-- Scripts All custom page related scripts goes below this -->

<!-- / Scripts -->