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
        <ul class="legend">
            <li><b>All Team Members (Click on a User Id to get all of it's Access)</b></li>
            <li class="pull-right"><span class="deactivated"></span> Deactivated</li>
            <li class="pull-right"><span class="activated"></span> Activated</li>
        </ul>
        <!-- / Panel Header -->
    </div>
    <div class="panel-body">
        <!-- Panel Body -->
        <div class="col-md-12">
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
                        <th><?php echo h('#'); ?></th>
                        <th data-sortable="true" data-switchable="false"><?php echo h('User Id'); ?></th>
                        <th data-sortable="true"><?php echo h('Name'); ?></th>
                        <th data-sortable="true"><?php echo h('No of Access'); ?></th>
                        <th data-sortable="true" data-visible="false" data-switchable="false"><?php echo h('Current Status'); ?></th>
                        <th class="actions" data-switchable="false"><?php echo __('Actions'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach ($accessDetails as $accessDetail): ?>
                    <tr>
                        <td><?php echo h($i++); ?>&nbsp;</td>
                        <td><?php
                                $text = $accessDetail['AccessDetail']['uniqueid'];
                                $url = "index/".$text;
                                echo "<a href='$url'>$text</a>";
                              ?>
                        &nbsp;</td>
                        <td><?php echo h($accessDetail['AccessDetail']['fname'] . " " . $accessDetail['AccessDetail']['lname']); ?>&nbsp;</td>
                        <td><?php echo h($accessDetail[0]['accesscount']); ?>&nbsp;</td>
                        <td><?php echo h(AccessDetailsController::userStatusFlagConverter($accessDetail['AccessDetail']['status'])); ?></td>
                        <td class="actions">
                            <?php
                                if($accessDetail['AccessDetail']['status'] == AppController::$ActivateUserStatus) {
                                    echo $this->Form->postLink(__('Deactivate'), array('action' => 'deactivate', $accessDetail['AccessDetail']['uniqueid']), array('class' => 'glyphicon','title'=>'Deactivate User'), __('Are you sure you want to deactivate # %s, It will automatically deactivate all the access this user have?', $accessDetail['AccessDetail']['uniqueid']));
                                } else {
                                    echo $this->Form->postLink(__('Activate'), array('action' => 'activate', $accessDetail['AccessDetail']['uniqueid']), array('class' => 'glyphicon','title'=>'Activate User'), __('Are you sure you want to activate # %s, It will automatically activate all the access this user have?', $accessDetail['AccessDetail']['uniqueid']));
                                }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- / Panel Body -->
    </div>
</div>
<!-- Scripts All custom page related scripts goes below this -->
<script type="text/javascript">
    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];
        if(row[4] == 'Activated') {
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