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
        <a href="/<?php echo $root?>/AccessDetails/add" class="btn btn-success btn-sm pull-right" style="margin-top: -5px;">
            <span class="glyphicon glyphicon-plus"></span> Add
        </a>
        <a href="/<?php echo $root?>/AccessDetails/autoSuggestItems/20" class="btn btn-info btn-sm pull-right" style="margin-top: -5px; margin-right: 10px;">
            <span class="glyphicon glyphicon-tasks"></span> Auto Suggest Items for Audit
        </a>
        <a href="/<?php echo $root?>/AccessDetails/autoSuggestMembers/20" class="btn btn-danger btn-sm pull-right" style="margin-top: -5px; margin-right: 10px;">
            <span class="glyphicon glyphicon-tasks"></span> Auto Suggest Team Members
        </a>

        <ul class="legend">
            <li>
                <b>Access Detail
                    <!-- extra text to print if accessing for a particular user -->
                    <?php if(isset($this->params['pass'][0]))
                    echo "of ".$this->params['pass'][0] ?>
                </b>
            </li>

            <li class="pull-right"><span class="deactivated"></span> Not Audited</li>
            <li class="pull-right"><span class="activated"></span> Audited Once</li>
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
                        <th data-sortable="true"><?php echo h('Last Audited Month'); ?></th>
                        <th data-sortable="true"><?php echo h('Year'); ?></th>
                        <th data-sortable="true" data-visible="false" data-switchable="false"><?php echo h('AuditedFlag'); ?></th>
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
                            <td><?php
                                    if(!empty($accessDetail['lad']['latest_audit_month'])) {
                                        $dateObj   = DateTime::createFromFormat('!m', $accessDetail['lad']['latest_audit_month']);
                                        $monthName = $dateObj->format('M'); //F for full format
                                            echo h($monthName);
                                    }
                                 ?>&nbsp;
                            </td>
                            <td><?php echo h($accessDetail['lad']['latest_audit_year']); ?>&nbsp;</td>
                            <td><?php echo h(AccessDetailsController::auditStatusFlagConverter($accessDetail['lad']['latest_audit_year'])); ?></td>
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
<!-- Scripts All custom page related scripts goes below this -->
<script type="text/javascript">
    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];
        if(row[12] == '1') {
            return {
                classes: classes[1]
            };
        } else {
            return {
                classes: classes[4]
            };
        }
    }
</script>
<!-- / Scripts -->