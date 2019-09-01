<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

			<div class="content-wrapper">
				<section class="content-header">
					<?php echo $pagetitle; ?>
					<?php echo $breadcrumb; ?>
				</section>

				<section class="content">
					<div class="row">
						<div class="col-md-12">
							 <div class="box">
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo anchor($action["create"], '<i class="fa fa-plus"></i> '. "Create", array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
								</div>
								<div class="box-body">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
                                            <?php foreach ($header as $col):?>
												<th><?php echo $col; ?></th>
										    <?php endforeach ?>
                                            <th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                        <?php foreach ($lists as $list):?>
											<tr>
											    <?php foreach ($header as $col => $val):?>
												<td><?php echo htmlspecialchars($list->{$col}, ENT_QUOTES, 'UTF-8'); ?></td>
											    <?php endforeach ?>
												<td><div class="btn-group">
                                                <?php echo anchor($action["view"].'/'.$list->id, '<i class="fa fa-eye"></i> '.lang('actions_see').'</i>', array('class' => 'btn btn-info btn-flat btn-sm')); ?>                                                
													<?php echo anchor($action["edit"].'/'.$list->id, '<i class="fa fa-edit"></i> '.lang('actions_edit'), array('class' => 'btn btn-info btn-flat btn-sm')); ?>
													</div>
												</td>
											</tr>
                                        <?php endforeach;?>
										</tbody>
									</table>
								</div>
							</div>
						 </div>
					</div>
				</section>
			</div>
