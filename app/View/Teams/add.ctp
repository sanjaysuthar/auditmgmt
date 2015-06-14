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
        <b>Add New Team</b>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <!-- Panel Body -->
        <div class="col-md-12">
            <?php echo $this->Form->create('Team'); ?>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('name', array('label' => 'Team Name<span class="mandatory">*</span>', 'class'=>'form-control', 'pattern'=>'.{1,20}', 'title'=>'Not more than 20 characters', 'placeholder'=>'Ex: Lara Cargo'));?>
                </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('remarks', array('label' => 'Description', 'class'=>'form-control', 'pattern'=>'.{1,100}', 'title'=>'Not more than 100 characters', 'placeholder'=>'Ex: Java AMS Team'));?>
                </div>

                <br>
                <?php echo $this->Form->end(array('label'=>'Looks Good !! Create New Team', 'class'=>'btn btn-success pull-right', 'id'=>'addTeam')); ?>
            </div>
        </div>
        <!-- / Panel Body -->
    </div>
</div>
<!-- Scripts All custom page related scripts goes below this -->

<!-- / Scripts -->