<!--
 /**
 * Thrust: The Audit Management Tool
 * 
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	1.0
 * @since:	v1.0
 */
 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <b>Perform Audit</b>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <!-- Panel Body -->
        <?php echo $this->Form->create('AuditDetail', array('type'=>'file')); ?>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <?php echo $this->Form->input('access_detail_id', array('label'=>'Access ID<span class="mandatory">*</span>', 'class'=>'form-control', 'disabled'=>'true', 'type'=>'text')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('month', array('label'=>'Audited Month<span class="mandatory">*</span>', 'class'=>'form-control', 'options'=>$auditMonth, 'selected'=>date('m'))); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('year', array('label'=>'Audited Year<span class="mandatory">*</span>', 'class'=>'form-control', 'options'=>$auditYear, 'selected'=>date('Y'))); ?>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <?php echo $this->Form->input('status', array('label'=>'Audit Status<span class="mandatory">*</span>', 'class'=>'form-control', 'options'=>$auditStatus)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('auditor', array('label'=>'Auditor Id<span class="mandatory">*</span>', 'class'=>'form-control', 'value'=>$this->Session->read('Auth.User.userid'), 'readonly'=>true)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('comments', array('label'=>'Remarks', 'class'=>'form-control', 'placeholder'=>'Ex: Audit failed because of access violation')); ?>
                    </div>
                    <!--<div class="form-group">
                        <?php echo $this->Form->input('evidence2', array('label'=>'Screenshot 1', 'class'=>'form-control')); ?>
                    </div>-->
                  </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <!-- Put capture="camera" for Mobile Uploads and remove Multiple attr, Single upload only -->
                        <?php echo $this->Form->input('evidence1', array('name'=>'data[AuditDetail][evidences][]', 'type'=>'file', 'label'=>'Evidences', 'class'=>'form-control file', 'capture'=>'camera', 'accept'=>'image/*')); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php echo $this->Form->end(array('label'=>'Look\'s good, Save it !!!', 'class'=>'btn btn-success pull-right', 'id'=>'addAudit')); ?>
            </div>
        </div>
        <!-- / Panel Body -->
    </div>
</div>
<!-- Scripts All custom page related scripts goes below this -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#AuditDetailEvidence1").fileinput({
            showUpload: false,
            maxFileCount: 2,
            maxFileSize: 5000,
            previewFileType: "image",
            browseClass: "btn btn-info",
            browseLabel: "Pick Image",
            browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: '<i class="glyphicon glyphicon-trash"></i>'
        });
    });
</script>
<!-- / Scripts -->
