<div class="accessDetails form">
<?php echo $this->Form->create('AccessDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Access Detail'); ?></legend>
	<?php
		echo $this->Form->input('accessid');
		echo $this->Form->input('uniqueid');
		echo $this->Form->input('fname');
		echo $this->Form->input('lname');
		echo $this->Form->input('systype');
		echo $this->Form->input('sysname');
		echo $this->Form->input('env');
		echo $this->Form->input('accresp');
		echo $this->Form->input('acctype');
		echo $this->Form->input('accprivilege');
		echo $this->Form->input('accidassigned');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AccessDetail.accessid')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('AccessDetail.accessid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Access Details'), array('action' => 'index')); ?></li>
	</ul>
</div>
