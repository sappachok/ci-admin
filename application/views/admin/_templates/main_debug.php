<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            <div class="alert alert-info">
                <p>
				<?php 
					if(is_array($debug)) var_dump($debug);
					else echo $debug; 
				?>
				</p>
            </div>
            </div>
        </div>
    </div>
</div>    