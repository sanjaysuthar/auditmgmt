<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!--
 /**
 * Thrust: The Audit Management Tool
 * 
 * @author: SANJAY SUTHAR
 * @email:  ss2445@gmail.com
 * @version:	1.0
 * @since:	v1.0
 */
 -->
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0"/>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
        echo $this->Html->css('dashboard');
        echo $this->Html->css('cakephp-inherited');
        echo $this->Html->css('fileinput');
        echo $this->Html->css('bootstrap-table');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script src="/<?php echo $root?>/js/jquery.min.js"></script>
    <script src="/<?php echo $root?>/js/bootstrap-table.js"></script>
    <script src="/<?php echo $root?>/js/tableExport.js"></script>
    <script src="/<?php echo $root?>/js/jquery.base64.js"></script>
    <script src="/<?php echo $root?>/js/bootstrap-table-export.js"></script>
</head>
<body>
<!-- Main Header -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <button type="button" id="menu-toggle" class="navbar-toggle toggle-custom">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="/<?php echo $root?>/img/audit-icon-3.png" width="40" height="40" class="pull-left" style="margin-top: 4px"/>
                <a class="navbar-brand" href="/<?php echo $root?>/accessdetails">&nbsp;&nbsp;<b>THRUST</b> : The Audit Management Tool
                    <!-- Print Team Name -->
                    <span style="color: lightgreen">
                       <?php
                        $team = $this->Session->read('team');
                        if($team != null)
                            echo $team;
                       ?>
                    </span>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        $user = $this->Session->read("user");
                        if($user != null)
                            echo "<li><a href=\"/".$root."/AccessDetails/listusers\">Dashboard</a></li>";
                    ?>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Help</a></li>
                    <!-- Print Logout Button -->
                    <?php
                        $user = $this->Session->read("user");
                        if($user != null)
                            echo "<li><a href=\"/".$root."/login/logout\">Logout</a></li>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>
<!-- / Main Header -->
<!-- Main Wrapper for Page -->
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li><a href="/<?php echo $root?>/AccessDetails">Access Details</a></li><!--class="sidebar-brand"-->
                <li><a href="/<?php echo $root?>/AuditDetails">Audits</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Export</a></li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- All Pages Loads Here -->
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
<!--<?php echo $this->element('sql_dump'); ?>-->
<!-- / Main Wrapper for Page -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

    <script src="/<?php echo $root?>/js/bootstrap.min.js"></script>
    <script src="/<?php echo $root?>/js/docs.min.js"></script>

    <script src="/<?php echo $root?>/js/fileinput.js"></script>
    <script src="/<?php echo $root?>/js/auditmgmt.js"></script>
    <!-- Toggle menu script for sidebar -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>