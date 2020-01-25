
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permission
        <small>New Permission</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Permission</h3>

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
                  <a href="<?php echo base_url();?>administration/permissions/index" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;BACK</a>
                  <p>&nbsp;</p>
              </div>
            
              <div class="col-md-12">
                 
                <form action="<?php echo base_url();?>administration/permissions/store" method="POST">
                    <div class="form-group">
                        <label for="menu">MENU:</label>
                        <select name="seleMenu" class="form-control">
                            <?php foreach ($menus as $menu): ?>                            
                                <option value="<?php echo $menu->MENU_Code;?>"><?php echo $menu->MENU_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>  

                    <div class="form-group">
                        <label for="role">ROLE:</label>
                        <select name="seleRole" class="form-control">
                            <?php foreach ($roles as $role): ?>                            
                                <option value="<?php echo $role->ROLE_Code;?>"><?php echo $role->ROLE_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>  
                    
                    <div class="form-group">
                        <label for="name">CREATE:</label>
                        <input type="radio" name="radioCreate" value="1" checked> ON
                        <input type="radio" name="radioCreate" value="0"> OFF
                    </div> 
                    <div class="form-group">
                        <label for="name">READ:</label>
                        <input type="radio" name="radioRead" value="1" checked> ON
                        <input type="radio" name="radioRead" value="0"> OFF
                    </div> 
                    <div class="form-group">
                        <label for="name">UPDATE:</label>
                        <input type="radio" name="radioUpdate" value="1" checked> ON
                        <input type="radio" name="radioUpdate" value="0"> OFF
                    </div> 
                    <div class="form-group">
                        <label for="name">DELETE:</label>
                        <input type="radio" name="radioDelete" value="1" checked> ON
                        <input type="radio" name="radioDelete" value="0"> OFF
                    </div>
                    
                    <div class="form-group">
                        <label for="state">STATE:</label>
                        <select name="seleState" class="form-control">
                            <option value="1">ON</option>
                            <option value="0">OFF</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" id="btnCreate" class="btn btn-primary btn-block btn-lg" value="CREATE PERMISSION">
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

 
