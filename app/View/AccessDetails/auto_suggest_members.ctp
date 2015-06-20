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
        <b>Perform Audit on <?php echo $percentage?>% of Suggested Team Members (Click on a User Id to get all of it's Access)</b>
        <div class="btn-group pull-right" style="margin-top: -7px">
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
                        <th data-sortable="true"><?php echo h('No of Access audited prior to this month'); ?></th>
                        <th data-sortable="true"><?php echo h('Percentage of Audited Items'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach ($teamMembers as $teamMember): ?>
                    <tr>
                        <td><?php echo h($i++); ?>&nbsp;</td>
                        <td><?php
                                $text = $teamMember['AccessDetail']['uniqueid'];
                                $url = "../index/".$text;
                                echo "<a href='$url'>$text</a>";
                            ?>
                            &nbsp;</td>
                        <td><?php echo h($teamMember['AccessDetail']['name']); ?>&nbsp;</td>
                        <td><?php echo h($teamMember['AccessDetail']['total_access']); ?>&nbsp;</td>
                        <td><?php echo h($teamMember['AccessDetail']['audited_before']); ?></td>
                        <td><?php echo h($teamMember['AccessDetail']['auditPerc'] . ' %'); ?></td>
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

<!-- / Scripts -->