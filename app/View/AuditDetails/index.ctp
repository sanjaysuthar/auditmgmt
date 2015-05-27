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
<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <b>All Audits</b>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0"
                   class="table table-hover"
                   data-toggle="table"
                   data-striped="true"
                   data-show-columns="true"
                   data-search="true"
                   data-show-toggle="true"
                   data-show-export="true"
                   data-show-pagination-switch="true"
                   data-pagination="true"
                   data-side-pagination="client"
                   data-row-style="rowStyle"
                   data-page-list="[5, 10, 20, 50, 100, 200]">
                <thead>
                <tr class="table-header">
                    <th data-sortable="true"><?php echo h('#'); ?></th>
                    <th data-sortable="true"><?php echo h('Access ID'); ?></th>
                    <th data-sortable="true"><?php echo h('Stauts'); ?></th>
                    <th data-sortable="true"><?php echo h('Audit Month'); ?></th>
                    <th data-sortable="true"><?php echo h('Year'); ?></th>
                    <th data-sortable="true"><?php echo h('Auditor'); ?></th>
                    <th data-sortable="true"><?php echo h('Remarks'); ?></th>
                    <th><?php echo h('Evidences'); ?></th>
                    <th class="actions" data-switchable="false"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($auditDetails as $auditDetail): ?>
                <tr>
                    <td><?php echo h($auditDetail['AuditDetail']['auditid']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['accessid']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['status']); ?></td>
                    <td><?php
                            $dateObj   = DateTime::createFromFormat('!m', $auditDetail['AuditDetail']['month']);
                            $monthName = $dateObj->format('M'); //F for full format
                            echo h($monthName); ?>&nbsp;
                    </td>
                    <td><?php echo h($auditDetail['AuditDetail']['year']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['auditor']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['comments']); ?>&nbsp;</td>
                    <td><?php
                            if(!empty($auditDetail['AuditDetail']['evidence1'])) {
                                echo $this->Html->image('../documents/'.$auditDetail['AuditDetail']['evidence1'], array('url' => '../documents/'.$auditDetail['AuditDetail']['evidence1'], 'class'=>'img-thumbnail', 'height'=>'150', 'width'=>'150', 'alt'=>'Evidence 1'));
                            }
                            echo h(' ');
                            if(!empty($auditDetail['AuditDetail']['evidence2'])) {
                                echo $this->Html->image('../documents/'.$auditDetail['AuditDetail']['evidence2'], array('url' => '../documents/'.$auditDetail['AuditDetail']['evidence2'], 'class'=>'img-thumbnail', 'height'=>'150', 'width'=>'150', 'alt'=>'Evidence 2'));
                            }
                        ?>&nbsp;
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__(''), array('action' => 'edit', $auditDetail['AuditDetail']['auditid']), array('class' => 'glyphicon glyphicon-edit','title'=>'Edit')); ?>
                        <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $auditDetail['AuditDetail']['auditid']), array('class' => 'glyphicon glyphicon-trash','title'=>'Delete'), __('Are you sure you want to delete # %s?', $auditDetail['AuditDetail']['auditid'])); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Scripts All custom page related scripts goes below this -->
<script type="text/javascript">
    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];
        if(row[2] == 'Success') {
            return {
                classes: classes[2]
            };
        } else {
            return {
                classes: classes[4]
            };
        }
    }
</script>
<!-- / Scripts -->