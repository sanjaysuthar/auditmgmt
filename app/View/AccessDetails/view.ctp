<div class="accessDetails view">
<h2><?php echo __('Access Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Accessid'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['accessid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uniqueid'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['uniqueid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fname'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['fname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lname'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['lname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Systype'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['systype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sysname'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['sysname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Env'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['env']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accresp'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['accresp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acctype'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['acctype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accprivilege'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['accprivilege']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accidassigned'); ?></dt>
		<dd>
			<?php echo h($accessDetail['AccessDetail']['accidassigned']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Access Detail'), array('action' => 'edit', $accessDetail['AccessDetail']['accessid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Access Detail'), array('action' => 'delete', $accessDetail['AccessDetail']['accessid']), array(), __('Are you sure you want to delete # %s?', $accessDetail['AccessDetail']['accessid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Access Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Access Detail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
