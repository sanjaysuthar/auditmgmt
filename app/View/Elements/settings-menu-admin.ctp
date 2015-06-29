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
<li role="presentation" class="divider"></li>
<li role="presentation" class="dropdown-header btn-danger" style="color: #ffffff">Thrust Users</li>
<li role="presentation">
    <a role="menuitem" tabindex="-1" href="/users/">Manage Users
        <?php if($this->Session->read('resetPasswordCount') != null) {
                echo '<span class="badge badge-important pull-right">'.$this->Session->read('resetPasswordCount').'</span>';
        }?>
    </a>
</li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="/users/add">Add New User</a></li>
<li role="presentation" class="divider"></li>

<li role="presentation" class="dropdown-header btn-danger" style="color: #ffffff">Thrust Teams</li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="/teams/">Manage Teams</a></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="/teams/add">Add New Team</a></li>
<li role="presentation" class="divider"></li>

<li role="presentation">
    <a role="menuitem" tabindex="-1" href="/users/updateThrustFromRepo" onclick="showUpdateThrustModal()">Update Thrust
        <span class="glyphicon glyphicon-download-alt pull-right"></span>
    </a>
</li>