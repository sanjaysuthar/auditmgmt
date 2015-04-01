<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <b>Access Detail</b>
        <a href="AccessDetails/add" class="btn btn-success btn-sm pull-right" style="margin-top: -5px;">
            <span class="glyphicon glyphicon-plus"></span> Add
        </a>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" class="table table-hover">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('accessid', '#'); ?></th>
                        <th><?php echo $this->Paginator->sort('uniqueid', 'UID'); ?></th>
                        <th><?php echo $this->Paginator->sort('fname', 'Name'); ?></th>
                        <th><?php echo $this->Paginator->sort('lname', ' '); ?></th>
                        <th><?php echo $this->Paginator->sort('systype', 'Sys Type'); ?></th>
                        <th><?php echo $this->Paginator->sort('sysname', 'Sys Name'); ?></th>
                        <th><?php echo $this->Paginator->sort('env', 'Env.'); ?></th>
                        <th><?php echo $this->Paginator->sort('accresp', 'Resp.'); ?></th>
                        <th><?php echo $this->Paginator->sort('acctype', 'Type'); ?></th>
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