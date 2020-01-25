
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>New User</small>
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
                 
                <form action="<?php echo base_url();?>administration/users/store" method="POST">
                    <div class="form-group">
                        <label for="role">ROLE:</label>
                        <select name="seleRole" class="form-control">
                            <?php foreach ($roles as $role): ?>                            
                            <option value="<?php echo $role->ROLE_Code;?>"><?php echo $role->ROLE_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>
                    
                    <div class="form-group <?php echo !empty(form_error('txtFullname'))?'has-error':'';?>">
                        <label for="name">FULLNAME:</label>
                        <input type="text" name="txtFullname" class="form-control" value="<?php echo set_value('txtFullname'); ?>">
                        <?php echo form_error('txtFullname','<span class="help-block be-red">','</span>'); ?>
                    </div>
                    
                    <div class="form-group <?php echo !empty(form_error('txtEmail'))?'has-error':'';?>">
                        <label for="email">EMAIL:</label>
                        <input type="email" name="txtEmail" class="form-control" value="<?php echo set_value('txtEmail'); ?>">
                        <?php echo form_error('txtEmail','<span class="help-block be-red">','</span>'); ?>
                    </div>

                    <div class="form-group <?php echo !empty(form_error('txtUsername'))?'has-error':'';?>">
                        <label for="username">USERNAME:</label>
                        <input type="text" name="txtUsername" class="form-control" value="<?php echo set_value('txtUsername'); ?>">
                        <?php echo form_error('txtUsername','<span class="help-block be-red">','</span>'); ?>
                    </div>

                    <div class="form-group <?php echo !empty(form_error('txtPassword'))?'has-error':'';?>">
                        <label for="password">PASSWORD:</label>
                        <input type="password" name="txtPassword" class="form-control" value="<?php echo set_value('txtPassword'); ?>">
                        <?php echo form_error('txtPassword','<span class="help-block be-red">','</span>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="avatar">URL AVATAR:</label>
                        <input type="text" name="txtAvatar" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="state">STATE:</label>
                        <select name="seleState" class="form-control">
                            <option value="1">ON</option>
                            <option value="0">OFF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnCreate" class="btn btn-primary btn-block btn-lg" value="CREATE USER">
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

 
