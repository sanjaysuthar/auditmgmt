<div class="auditDetails view">
<h2><?php echo __('Audit Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Auditid'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['auditid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accessid'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['accessid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Month'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['month']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Auditor'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['auditor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evidence1'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['evidence1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evidence2'); ?></dt>
		<dd>
			<?php echo h($auditDetail['AuditDetail']['evidence2']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Audit Detail'), array('action' => 'edit', $auditDetail['AuditDetail']['auditid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Audit Detail'), array('action' => 'delete', $auditDetail['AuditDetail']['auditid']), array(), __('Are you sure you want to delete # %s?', $auditDetail['AuditDetail']['auditid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Audit Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audit Detail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
