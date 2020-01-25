
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Edit User</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form User</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
              <div class="col-md-12">
                  <a href="<?php echo base_url();?>administration/users/index" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;BACK</a>
                  <p>&nbsp;</p>
              </div>
            
              <div class="col-md-12">
                <div class="messages">
                  <?php if ($this->session->flashdata("error")):?>          
                    <div class="alert alert-danger" role="alert">
                      <a href="#" class="alert-link"><?php echo $this->session->flashdata("error"); ?></a>
                    </div>        
                  <?php endif; ?> 
                </div>  
                <form action="<?php echo base_url();?>administration/users/update" method="POST">

                    <input type="hidden" name="txtId" value="<?php echo $user->USER_Code; ?>">
                    <div class="form-group">
                        <label for="role">ROLE:</label>
                        <select name="seleRole" class="form-control">
                            <?php foreach ($roles as $role): ?>                            
                            <option <?php echo $role->ROLE_Code==$user->ROLE_Code ? 'selected' : '';?> value="<?php echo $role->ROLE_Code;?>"><?php echo $role->ROLE_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>
                    
                    <div class="form-group <?php echo !empty(form_error('txtFullname'))?'has-error':'';?>">
                        <label for="name">FULLNAME:</label>
                        <input type="text" name="txtFullname" class="form-control" value="<?php echo !empty(form_error('txtFullname')) ? set_value('txtFullname') : $user->USER_Fullname; ?>">
                        <?php echo form_error('txtFullname','<span class="help-block be-red">','</span>'); ?> 
                    </div>
                    
                    <div class="form-group <?php echo !empty(form_error('txtEmail'))?'has-error':'';?>">
                        <label for="email">EMAIL:</label>
                        <input type="email" name="txtEmail" class="form-control" value="<?php echo !empty(form_error('txtEmail')) ? set_value('txtEmail') : $user->USER_Email; ?>">
                        <?php echo form_error('txtEmail','<span class="help-block be-red">','</span>'); ?>
                    </div>

                    <div class="form-group <?php echo !empty(form_error('txtUsername'))?'has-error':'';?>">
                        <label for="username">USERNAME:</label>
                        <input type="text" name="txtUsername" class="form-control" value="<?php echo !empty(form_error('txtUsername')) ? set_value('txtUsername') : $user->USER_Username; ?>">
                        <?php echo form_error('txtUsername','<span class="help-block be-red">','</span>'); ?>
                    </div>

                    <div class="form-group <?php echo !empty(form_error('txtPassword'))?'has-error':'';?>">
                        <label for="password">PASSWORD:</label>
                        <input type="password" name="txtPassword" class="form-control" value="<?php echo !empty(form_error('txtPassword')) ? set_value('txtPassword') : $user->USER_Password; ?>">
                        <?php echo form_error('txtPassword','<span class="help-block be-red">','</span>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="avatar">URL AVATAR:</label>
                        <div>
                            <?php if($user->USER_Avatar):?>
                                <img width="150" src="<?php echo $user->USER_Avatar; ?>" alt="<?php echo $user->USER_Fullname; ?>">
                            <?php endif; ?>
                        </div>
                        <input type="text" name="txtAvatar" class="form-control" value="<?php echo $user->USER_Avatar; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="state">STATE:</label>
                        <select name="seleState" class="form-control">
                            <option <?php echo $user->USER_Flag == '1' ? 'selected' : '';?> value="1">ON</option>
                            <option <?php echo $user->USER_Flag == '0' ? 'selected' : '';?> value="0">OFF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnUpdate" class="btn btn-primary btn-block btn-lg" value="UPDATE USER">
                    </div>
                </form>
              </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
