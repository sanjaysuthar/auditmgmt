<div class="panel panel-default">
    <div class="panel-heading">
        <b>Access Detail</b>
    </div>
    <div class="panel-body">
	<!--<h2 class="sub-header"><?php echo __('Access Details'); ?></h2>-->
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-hover">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('accessid', '#'); ?></th>
                        <th><?php echo $this->Paginator->sort('uniqueid', 'UID'); ?></th>
                        <th><?php echo $this->Paginator->sort('fname', 'First Name'); ?></th>
                        <th><?php echo $this->Paginator->sort('lname', 'Last Name'); ?></th>
                        <th><?php echo $this->Paginator->sort('systype', 'System Type'); ?></th>
                        <th><?php echo $this->Paginator->sort('sysname', 'System Name'); ?></th>
                        <th><?php echo $this->Paginator->sort('env', 'Env.'); ?></th>
                        <th><?php echo $this->Paginator->sort('accresp', 'Resp.'); ?></th>
                        <th><?php echo $this->Paginator->sort('acctype', 'Access Type'); ?></th>
                        <th><?php echo $this->Paginator->sort('accprivilege', 'Privilege'); ?></th>
                        <th><?php echo $this->Paginator->sort('accidassigned', 'Assigned ID'); ?></th>
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
                            <!--<?php echo $this->Html->link(__('View'), array('action' => 'view', $accessDetail['AccessDetail']['accessid'])); ?>-->
                            <?php echo $this->Html->link(__(''), array('action' => 'edit', $accessDetail['AccessDetail']['accessid']), array('class' => 'glyphicon glyphicon-edit','title'=>'Edit')); ?>
                            <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $accessDetail['AccessDetail']['accessid']), array('class' => 'glyphicon glyphicon-trash','title'=>'Delete'), __('Are you sure you want to delete # %s?', $accessDetail['AccessDetail']['accessid'])); ?>
                            <?php echo $this->Html->link(__(''), array('action' => 'doAudit', $accessDetail['AccessDetail']['accessid']), array('class' => 'glyphicon glyphicon-check','title'=>'Audit')); ?>

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