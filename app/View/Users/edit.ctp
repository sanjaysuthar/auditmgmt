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
        <b>Edit User</b>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <?php echo $this->Form->create('User'); ?>
            <?php echo $this->Form->input('id');?>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('userid', array('label' => 'User ID<span class="mandatory">*</span>', 'class'=>'form-control', 'placeholder'=>'Ex: sanjaykumar', 'readonly'=>true));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('name', array('label' => 'Name<span class="mandatory">*</span>', 'class'=>'form-control', 'placeholder'=>'Ex: Sanjay Kumar'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('label' => 'Email ID<span class="mandatory">*</span>', 'class'=>'form-control', 'placeholder'=>'Ex: email@domain.com'));?>
                </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('contact', array('label' => 'Contact No<span class="mandatory">*</span>', 'class'=>'form-control', 'type'=>'number', 'placeholder'=>'Ex: 9988776655'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('teams_id', array('label' => 'Team<span class="mandatory">*</span>','class'=>'form-control','options'=>$teamList));?>
                </div>
                <br>
                <?php echo $this->Form->end(array('label'=>'Looks Good, Save it!', 'class'=>'btn btn-success pull-right', 'id'=>'editUser')); ?>
            </div>
        </div>
    </div>
</div>