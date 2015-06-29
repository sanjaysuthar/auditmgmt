<!--
 /**
 * Thrust: The Audit Management Tool
 *
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v2.0
 */
 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <!-- Panel Header -->
        <b>Manage Thrust Teams</b>
        (Editing a team is not permitted, alternate is delete and create new team)
        <a href="/teams/add" class="btn btn-success btn-sm pull-right" style="margin-top: -5px;">
            <span class="glyphicon glyphicon-plus"></span> Add
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
                    <th data-sortable="false"><?php echo h('#'); ?></th>
                    <th data-sortable="true"><?php echo h('Team Name'); ?></th>
                    <th data-sortable="true"><?php echo h('Description'); ?></th>
                    <th class="actions" data-switchable="false"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach ($teamModel as $team): ?>
                <tr>
                    <td><?php echo h($i++); ?>&nbsp;</td>
                    <td><?php echo h($team['Team']['name']); ?>&nbsp;</td>
                    <td><?php echo h($team['Team']['remarks']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php
                            if(true) {
                                echo $this->Html->link(__('LoginAs'), array('controller'=>'users', 'action' => 'changeTeam', $team['Team']['id']), array('class' => 'glyphicon','title'=>'Login As'));
                            }
                        ?>
                        &nbsp;
                        <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $team['Team']['id']), array('class' => 'glyphicon glyphicon-trash','title'=>'Delete'), __('Are you sure you want to delete # %s team, All associated users with team will no longer be able to login ?', $team['Team']['name'])); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Scripts All custom page related scripts goes below this -->

<!-- / Scripts -->