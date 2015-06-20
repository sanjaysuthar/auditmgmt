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
        <b>Perform Audit on <?php echo $percentage?>% of Auto Suggested Access Details</b>
        <div class="btn-group pull-right">
            <button type="button" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Auto Suggest Percentage<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="10">10%</a></li>
                <li><a href="20">20%</a></li>
                <li><a href="30">30%</a></li>
                <li><a href="40">40%</a></li>
                <li><a href="50">50%</a></li>
                <li><a href="60">60%</a></li>
                <li><a href="70">70%</a></li>
                <li><a href="80">80%</a></li>
                <li><a href="90">90%</a></li>
                <li><a href="100">100%</a></li>
            </ul>
        </div>
        <br>
        <b style="color: lightseagreen">Audit suggestion is based on Access Details which has not been audited from long time, appear first in table</b>
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
                    <th data-sortable="true"><?php echo h('Resp'); ?></th>
                    <th data-sortable="true"><?php echo h('Type'); ?></th>
                    <th data-sortable="true"><?php echo h('Privilege'); ?></th>
                    <th data-sortable="true"><?php echo h('Assigned ID'); ?></th>
                    <th data-sortable="true"><?php echo h('Last Audited Month'); ?></th>
                    <th data-sortable="true"><?php echo h('Year'); ?></th>
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
                    <td class="actions">
                        <?php echo $this->Html->link(__(''), array('controller'=>'AuditDetails', 'action' => 'add', $accessDetail['AccessDetail']['accessid']), array('class' => 'glyphicon glyphicon-check','title'=>'Audit')); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>