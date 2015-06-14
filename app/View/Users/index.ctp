<!--
 /**
 * Thrust: The Audit Management Tool
 *
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v1.0
 */
 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <a href="/<?php echo $root?>/users/add" class="btn btn-success btn-sm pull-right" style="margin-top: -5px;">
            <span class="glyphicon glyphicon-plus"></span> Add
        </a>
        <ul class="legend">
            <li><b>Manage Thrust Users</b></li>
            <li class="pull-right"><span class="activated-info"></span> Reset Password Request</li>
        </ul>
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
                   data-row-style="rowStyle"
                   data-page-list="[5, 10, 20, 50, 100, 200]">
                <thead>
                <tr class="table-header">
                    <th data-sortable="false"><?php echo h('#'); ?></th>
                    <th data-sortable="true"><?php echo h('User ID'); ?></th>
                    <th data-sortable="true"><?php echo h('Name'); ?></th>
                    <th data-sortable="true"><?php echo h('Email'); ?></th>
                    <th data-sortable="true"><?php echo h('Contact'); ?></th>
                    <th data-visible="false" data-switchable="false"><?php echo h('Forgot'); ?></th>
                    <th data-sortable="true"><?php echo h('Team'); ?></th>
                    <th class="actions" data-switchable="false"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo h($i++); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['userid']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['contact']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['forgot_flag']); ?></td>
                        <td><?php echo h(($user['Teams']['name'])); ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__(''), array('action' => 'edit', $user['User']['id']), array('class' => 'glyphicon glyphicon-edit','title'=>'Edit')); ?>
                            <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $user['User']['id']), array('class' => 'glyphicon glyphicon-trash','title'=>'Delete'), __('Are you sure you want to delete # %s?', $user['User']['userid'])); ?>
                            <?php echo $this->Html->link(__(''), array('action' => 'resetPassword', $user['User']['id']), array('class' => 'glyphicon glyphicon-cog','title'=>'Reset Password')); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Scripts All custom page related scripts goes below this -->
<script type="text/javascript">
    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];
        if(row[5] == '1') {
            return {
                classes: classes[2]
            };
        } else {
            return {
                classes: classes[0]
            };
        }
    }
</script>
<!-- / Scripts -->