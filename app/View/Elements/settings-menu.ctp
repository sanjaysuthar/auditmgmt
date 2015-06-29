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
<li>
    <a href="#" id="helpmenu" class="dropdown-toggle" data-toggle="dropdown">Settings</a>

    <ul class="dropdown-menu" role="menu" aria-labelledby="helpmenu">
        <li role="presentation" class="dropdown-header btn-primary" style="color: #ffffff">Welcome <?php echo $this->Session->read('Auth.User.name');?></li>
        <li role="presentation" class="dropdown-header btn-warning" style="color: #ffffff"><?php echo $this->Session->read('Auth.User.Teams.name'). ' Team';?></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/users/changePassword">Change Password</a></li>
        <?php
            if($this->Session->read('Auth.User.role') == 'admin') {
                echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="/teams/">Login As Different Team</a></li>';
            }
        ?>
        <li role="presentation" class="divider"></li>
        <li role="presentation" class="dropdown-header btn-success" style="color: #ffffff">Manage Your Team</li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="/accessdetails/listusers">Team Members</a></li>
        <?php
            if($this->Session->read('Auth.User.role') == 'admin') {
                echo $this->element('settings-menu-admin');
            }
        ?>
    </ul>
</li>