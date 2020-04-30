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
                                    <h3 class="box-title">Create</h3>
                                </div>
                                <div class="box-body">
                                    <?php //echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => '', 'id' => 'form-create')); ?>
									<?php foreach($form_input as $key => $inp) : ?>
                                        <div class="form-group">
											<label for="<?php echo $inp["id"]; ?>" class="col-sm-2 control-label"><?php echo $inp["label"]; ?></label>
                                            <div class="col-sm-10">
							                <div class="form-group">
                                            <?php 
											if($inp["type"]=="text") echo form_input($inp);
											else if($inp["type"]=="select") {
                                                $options = Array(""=>"Please Select");
												if(@$inp["options"]) {
													$inp_options = Array();
													$inp_options = (array) $inp["options"];
												}
												//if(@$inp["options"]) $options = $inp["options"];
                                                echo form_dropdown($inp, $options, $inp["value"]);
                                            } else if($inp["type"]=="textarea") {
												echo form_textarea($inp);
											}

											echo form_error($inp["name"], '<div class="error">', '</div>');
											?>
											</div>
                                            </div>
                                        </div>
									<?php endforeach ?>
                                    <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <?php echo form_hidden($csrf); ?>
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                    <?php echo anchor($action["cancel"], lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>                                    
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>