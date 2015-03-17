<div class="accessDetails index">
	<h2><?php echo __('Access Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('accessid'); ?></th>
			<th><?php echo $this->Paginator->sort('uniqueid'); ?></th>
			<th><?php echo $this->Paginator->sort('fname'); ?></th>
			<th><?php echo $this->Paginator->sort('lname'); ?></th>
			<th><?php echo $this->Paginator->sort('systype'); ?></th>
			<th><?php echo $this->Paginator->sort('sysname'); ?></th>
			<th><?php echo $this->Paginator->sort('env'); ?></th>
			<th><?php echo $this->Paginator->sort('accresp'); ?></th>
			<th><?php echo $this->Paginator->sort('acctype'); ?></th>
			<th><?php echo $this->Paginator->sort('accprivilege'); ?></th>
			<th><?php echo $this->Paginator->sort('accidassigned'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($accessDetails as $accessDetail): ?>
	<tr>
		<td><?php echo h($accessDetail['AccessDetail']['accessid']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['uniqueid']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['fname']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['lname']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['systype']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['sysname']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['env']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['accresp']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['acctype']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['accprivilege']); ?>&nbsp;</td>
		<td><?php echo h($accessDetail['AccessDetail']['accidassigned']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accessDetail['AccessDetail']['accessid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accessDetail['AccessDetail']['accessid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accessDetail['AccessDetail']['accessid']), array('confirm' => __('Are you sure you want to delete # %s?', $accessDetail['AccessDetail']['accessid']))); ?>
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
		<li><?php echo $this->Html->link(__('New Access Detail'), array('action' => 'add')); ?></li>
	</ul>
</div>
