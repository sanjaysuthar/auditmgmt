<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <b>Access Detail</b>
        <a href="AccessDetails/add" class="btn btn-success btn-sm pull-right" style="margin-top: -5px;">
            <span class="glyphicon glyphicon-plus"></span> Add
        </a>
        <a href="AccessDetails/autosuggest" class="btn btn-info btn-sm pull-right" style="margin-top: -5px; margin-right: 10px;">
            <span class="glyphicon glyphicon-tasks"></span> Auto Suggest for Audit
        </a>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table cellpadding="0" cellspacing="0"
                   class="table table-hover"
                   data-toggle="table"
                   data-striped="true"
                   data-show-columns="true"
                   data-search="true"
                   data-show-toggle="true"
                   data-show-export="true"
                   data-show-pagination-switch="true"
                   data-pagination="true"
                   data-side-pagination="client"
                   data-page-list="[5, 10, 20, 50, 100, 200]">
                <thead>
                    <tr class="table-header">
                        <th data-sortable="true"><?php echo h('#'); ?></th>
                        <th data-sortable="true"><?php echo h('UID'); ?></th>
                        <th data-sortable="true"><?php echo h('Name'); ?></th>
                        <th data-sortable="true"><?php echo h('Sys Type'); ?></th>
                        <th data-sortable="true"><?php echo h('Sys Name'); ?></th>
                        <th data-sortable="true"><?php echo h('Env'); ?></th>
                        <th data-sortable="true"><?php echo h('Resp.'); ?></th>
                        <th data-sortable="true"><?php echo h('Type'); ?></th>
                        <th data-sortable="true"><?php echo h('Privilege'); ?></th>
                        <th data-sortable="true"><?php echo h('Assigned ID'); ?></th>
                        <th class="actions" data-switchable="false"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($accessDetails as $accessDetail): ?>
                        <tr>
                            <td><?php echo h($accessDetail['AccessDetail']['accessid']); ?>&nbsp;</td>
                            <td><?php echo h($accessDetail['AccessDetail']['uniqueid']); ?>&nbsp;</td>
                            <td><?php echo h($accessDetail['AccessDetail']['fname'] . " " . $accessDetail['AccessDetail']['lname']); ?>&nbsp;</td>
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
                                <?php echo $this->Html->link(__(''), array('controller'=>'AuditDetails', 'action' => 'add', $accessDetail['AccessDetail']['accessid']), array('class' => 'glyphicon glyphicon-check','title'=>'Audit')); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>