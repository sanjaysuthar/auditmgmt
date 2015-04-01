<div class="panel panel-default">
    <div class="panel-heading">
        <b>Edit Access Detail</b>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <?php echo $this->Form->create('AccessDetail'); ?>
            <?php echo $this->Form->input('accessid');?>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('uniqueid', array('label' => 'Unique ID', 'class'=>'form-control', 'placeholder'=>'Ex: Incognitos'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('fname', array('label' => 'First Name', 'class'=>'form-control', 'placeholder'=>'Ex: Sanjay'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('lname', array('label' => 'Last Name', 'class'=>'form-control', 'placeholder'=>'Ex: Kumar'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('systype', array('label' => 'System Type', 'class'=>'form-control', 'options'=>$sysTypes));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('sysname', array('label' => 'System Name / IP Address', 'class'=>'form-control', 'placeholder'=>'Ex: Lara Cargo'));?>
                </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('env', array('label' => 'Environment','class'=>'form-control','options'=>$environments));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('accresp', array('label' => 'Access Responsible', 'class'=>'form-control', 'placeholder'=>'Ex: CS'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('acctype', array('label' => 'Access Type', 'class'=>'form-control', 'options'=>$accessTypes));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('accprivilege', array('label' => 'Privilege Type', 'class'=>'form-control', 'options'=>$accessPrivileges));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('accidassigned', array('label' => 'Assigned Access ID', 'class'=>'form-control', 'placeholder'=>'Ex: Linkin Park'));?>
                </div>
                <br>
                <?php echo $this->Form->end(array('label'=>'Save', 'class'=>'btn btn-success pull-right', 'id'=>'addAccess')); ?>
            </div>
        </div>
    </div>
</div>