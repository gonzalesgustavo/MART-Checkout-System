<div class="container">
    <div class="row pl-2 pr-2">
        <div class="col-sm-6 col-lg-6 ml-auto mr-auto mt-5">
			
			<?php echo $this->session->flashdata('message'); ?>
			
			<h1>Register New User</h1>
			<br>

			<?php echo form_open('employees/register') ?>
			
				<!-- user type -->
                <div class="form-group">
                    <label for="form_name" class="control-label">Role</label>
						
						<!-- helper function to generate select form field with options -->
						<?php 
						$selected = set_value('form_role');
						echo form_dropdown('form_role', $roles, $selected); 
						?>
						
					<span class="text-danger"><?php echo form_error('form_role'); ?></span>
                 </div>
			
                <!-- banner id -->
                <div class="form-group">
					<label for="form_id" class="control-label">Banner ID</label>
					<div class="input-group">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					
  					<input class="form-control" id="form_id" name="form_id" placeholder="" type="text"  aria-describedby="basic-addon1" value="<?php echo set_value('form_id'); ?>" />
					  
					</div>
					
					<span class="text-danger"><?php echo form_error('form_id'); ?></span>
                </div>
				
				
				
                <!-- name -->
                <div class="form-group">
                    <label for="form_name" class="control-label">Name</label>
					<input class="form-control" id="form_name" name="form_name" placeholder="Name" type="text" value="<?php echo set_value('form_name'); ?>" />
					<span class="text-danger"><?php echo form_error('form_name'); ?></span>
                 </div>
				
               
                <!-- register button -->
                <div class="form-group">
					<input id="btn_register" name="btn_register" type="submit" class="btn btn-primary" value="Register" />
					<input type="reset" id="btn_reset" name="btn_reset" class="btn btn-default" value="Cancel"/>
                </div>
				
			<?php echo form_close(); ?>
            
        </div>
    </div>

</div>