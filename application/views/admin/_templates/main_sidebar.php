<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>
<?php endif; ?>

<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li>
                            <a href="<?php echo site_url('/'); ?>">
                                <i class="fa fa-home text-primary"></i> <span><?php echo lang('menu_access_website'); ?></span>
                            </a>
                        </li>

						<li class="header">MAIN NAVIGATION</li>
						<li class="treeview">
						  <a href="#">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
						  </a>
						  <ul class="treeview-menu">
							<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
							<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
						  </ul>
						</li>
                        <li class="header text-uppercase"><?php echo lang('menu_administration'); ?></li>

                        <?php
						$group_regist = $this->control_model->regist_group_model();

						foreach($group_regist as $grp) {
						?>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-circle-o"></i>
                                <span><?php echo $grp->params->label; ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
						<?php
							if($grp->model)
							foreach($grp->model as $model) {
						?>
                            <ul class="treeview-menu">
                                <li class=""><a href="<?php echo site_url('admin/control/').$model->model; ?>"><i class="fa fa-circle-o"></i> <?php echo $model->label; ?></a></li>
                            </ul>
						<?php
						}
						?>
                        </li>
						<?php
						}
						?>

						<?php
                        $admin_regist = $this->control_model->regist_models();
                        foreach($admin_regist as $reg) {
                        ?>
                        <li class="<?=active_link_controller($reg->name)?>">
                            <a href="<?php echo site_url('admin/control/'.$reg->name); ?>">
                                <i class="<?php echo $reg->params->icon; ?>"></i> <span><?php echo $reg->params->label; ?></span>
                            </a>
                        </li>
                        <?php                            
                        }
                        ?>

                        <li class="treeview <?=active_link_controller('prefs')?>">
                            <a href="#">
                                <i class="fa fa-circle-o"></i>
                                <span><?php echo lang('menu_preferences'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/prefs/interfaces/admin'); ?>"><i class="fa fa-circle-o"></i> <?php echo lang('menu_interfaces'); ?></a></li>
                            </ul>
                        </li>
						
                        <li class="<?=active_link_controller('users')?>">
                            <a href="<?php echo site_url('admin/users'); ?>">
                                <i class="fa fa-user"></i> <span><?php echo lang('menu_users'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="<?php echo site_url('admin/groups'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo lang('menu_security_groups'); ?></span>
                            </a>
                        </li>
                        <li class="treeview <?=active_link_controller('prefs')?>">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span><?php echo lang('menu_preferences'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/prefs/interfaces/admin'); ?>"><?php echo lang('menu_interfaces'); ?></a></li>
                            </ul>
                        </li>
                        <li class="<?=active_link_controller('files')?>">
                            <a href="<?php echo site_url('admin/files'); ?>">
                                <i class="fa fa-file"></i> <span><?php echo lang('menu_files'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('database')?>">
                            <a href="<?php echo site_url('admin/database'); ?>">
                                <i class="fa fa-database"></i> <span><?php echo lang('menu_database_utility'); ?></span>
                            </a>
                        </li>


                        <li class="header text-uppercase"><?php echo $title; ?></li>
                        <li class="<?=active_link_controller('resources')?>">
                            <a href="<?php echo site_url('admin/resources'); ?>">
                                <i class="fa fa-cubes"></i> <span><?php echo lang('menu_resources'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('resources')?>">
                            <a href="<?php echo base_url('assets/themes/AdminLTE/'); ?>" target="_blank">
                                <i class="fa fa-paint-brush"></i> <span>Themes</span>
                            </a>
                        </li>                        
                        <li class="header text-uppercase">Debug Tools</li>
                        <li class="<?=active_link_controller('resources')?>">
                            <a id="debug_btn" href="#message_debug">
                                <i class="fa fa-cubes"></i> <span>Message Debug</span>
                            </a>
                        </li>                        
                    </ul>
                </section>
            </aside>