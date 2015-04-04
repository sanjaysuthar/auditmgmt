<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <b>Add New Access Detail</b>
        <?php echo $this->Form->create('AccessDetail', array('type'=>'file', 'action' => 'uploadexcel')); ?>
            <span class="btn btn-primary btn-sm btn-file pull-right btn-header" style="line-height: 1;">
                <?php echo $this->Form->input('uploadexcelfile', array('type'=>'file', 'label'=>'Upload Excel')); ?>
            </span>
        <?php echo $this->Form->end(); ?>
        <a href="/auditmgmt/AuditTemplate.xls" class="btn btn-info btn-sm pull-right btn-header">
            <span class="glyphicon glyphicon-download-alt"></span> Excel Template
        </a>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <?php echo $this->Form->create('AccessDetail'); ?>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('uniqueid', array('label' => 'Unique ID<span class="mandatory">*</span>', 'class'=>'form-control mandatory', 'placeholder'=>'Ex: Incognitos'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('fname', array('label' => 'First Name', 'class'=>'form-control', 'placeholder'=>'Ex: Sanjay'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('lname', array('label' => 'Last Name', 'class'=>'form-control', 'placeholder'=>'Ex: Kumar'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('systype', array('label' => 'System Type<span class="mandatory">*</span>', 'class'=>'form-control', 'options'=>$sysTypes));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('sysname', array('label' => 'System Name / IP Address<span class="mandatory">*</span>', 'class'=>'form-control', 'placeholder'=>'Ex: Lara Cargo'));?>
                </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <?php echo $this->Form->input('env', array('label' => 'Environment<span class="mandatory">*</span>','class'=>'form-control','options'=>$environments));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('accresp', array('label' => 'Access Responsible<span class="mandatory">*</span>', 'class'=>'form-control', 'placeholder'=>'Ex: CS'));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('acctype', array('label' => 'Access Type<span class="mandatory">*</span>', 'class'=>'form-control', 'options'=>$accessTypes));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('accprivilege', array('label' => 'Privilege Type<span class="mandatory">*</span>', 'class'=>'form-control', 'options'=>$accessPrivileges));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('accidassigned', array('label' => 'Assigned Access ID<span class="mandatory">*</span>', 'class'=>'form-control', 'placeholder'=>'Ex: Linkin Park'));?>
                </div>
                <br>
                <?php echo $this->Form->end(array('label'=>'Create', 'class'=>'btn btn-success pull-right', 'id'=>'addAccess')); ?>
            </div>
        </div>
    </div>
</div>
<!-- Auto Submit Form When File Has Been Uploaded -->
<script type="text/javascript">
    document.getElementById("AccessDetailUploadexcelfile").onchange = function() {
        if(Validate(document.getElementById("AccessDetailUploadexcelForm"))) {
            document.getElementById("AccessDetailUploadexcelForm").submit();
        }
    };
</script>