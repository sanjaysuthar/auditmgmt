<div class="auditDetails index">
	<h2><?php echo __('Audit Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('auditid'); ?></th>
			<th><?php echo $this->Paginator->sort('accessid'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('month'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('auditor'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th><?php echo $this->Paginator->sort('evidence1'); ?></th>
			<th><?php echo $this->Paginator->sort('evidence2'); ?></th>
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
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $auditDetail['AuditDetail']['auditid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $auditDetail['AuditDetail']['auditid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $auditDetail['AuditDetail']['auditid']), array('confirm' => __('Are you sure you want to delete # %s?', $auditDetail['AuditDetail']['auditid']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Audit Detail'), array('action' => 'add')); ?></li>
	</ul>
</div>
