<div class="auditDetails form">
<?php echo $this->Form->create('AuditDetail'); ?>
	<fieldset>
		<legend><?php echo __('Add Audit Detail'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Audit Details'), array('action' => 'index')); ?></li>
	</ul>
</div>
