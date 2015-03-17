<div class="auditDetails form">
<?php echo $this->Form->create('AuditDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Audit Detail'); ?></legend>
	<?php
		echo $this->Form->input('auditid');
		echo $this->Form->input('accessid');
		echo $this->Form->input('status');
		echo $this->Form->input('month');
		echo $this->Form->input('year');
		echo $this->Form->input('auditor');
		echo $this->Form->input('comments');
		echo $this->Form->input('evidence1');
		echo $this->Form->input('evidence2');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AuditDetail.auditid')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('AuditDetail.auditid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Audit Details'), array('action' => 'index')); ?></li>
	</ul>
</div>
