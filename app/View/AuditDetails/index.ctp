<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <b>All Audits</b>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-hover">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('auditid', '#'); ?></th>
                    <th><?php echo $this->Paginator->sort('accessid', 'Access ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('status', 'Stauts'); ?></th>
                    <th><?php echo $this->Paginator->sort('month', 'Audit Month'); ?></th>
                    <th><?php echo $this->Paginator->sort('year', 'Year'); ?></th>
                    <th><?php echo $this->Paginator->sort('auditor', 'Auditor'); ?></th>
                    <th><?php echo $this->Paginator->sort('comments', 'Remarks'); ?></th>
                    <th><?php echo $this->Paginator->sort('evidence1', 'Evidences'); ?></th>
                    <th><?php echo $this->Paginator->sort('evidence2', ' '); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($auditDetails as $auditDetail): ?>
                <tr>
                    <td><?php echo h($auditDetail['AuditDetail']['auditid']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['accessid']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['status']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['month']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['year']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['auditor']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['comments']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['evidence1']); ?>&nbsp;</td>
                    <td><?php echo h($auditDetail['AuditDetail']['evidence2']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__(''), array('action' => 'edit', $auditDetail['AuditDetail']['auditid']), array('class' => 'glyphicon glyphicon-edit','title'=>'Edit')); ?>
                        <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $auditDetail['AuditDetail']['auditid']), array('class' => 'glyphicon glyphicon-trash','title'=>'Delete'), __('Are you sure you want to delete # %s?', $auditDetail['AuditDetail']['auditid'])); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
        <p>
            <?php
            echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>
        </p>
        <div class="paging">
            <?php
                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
            ?>
        </div>
    </div>
</div>