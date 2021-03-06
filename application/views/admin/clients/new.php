
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Client
        <small>New Client</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Client</h3>

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
                  <a href="<?php echo base_url();?>maintenance/clients/index" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;BACK</a>
                  <p>&nbsp;</p>
              </div>
            
              <div class="col-md-12">
                 
                <form action="<?php echo base_url();?>maintenance/clients/store" method="POST">
                    <div class="form-group">
                        <label for="client_type">CLIENT TYPE:</label>
                        <select name="seleClientType" class="form-control">
                            <?php foreach ($client_types as $ct): ?>                            
                            <option value="<?php echo $ct->CLT_Code;?>"><?php echo $ct->CLT_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>  

                    <div class="form-group">
                        <label for="doc_type">DOC. TYPE:</label>
                        <select name="seleDocType" class="form-control">
                            <?php foreach ($doc_types as $dt): ?>                            
                            <option value="<?php echo $dt->DOC_Code;?>"><?php echo $dt->DOC_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>  
                    
                    <div class="form-group <?php echo !empty(form_error('txtNumber'))?'has-error':'';?>">
                        <label for="name">NUMBER:</label>
                        <input type="text" name="txtNumber" class="form-control" value="<?php echo set_value('txtNumber'); ?>">
                        <?php echo form_error('txtNumber','<span class="help-block be-red">','</span>'); ?>
                    </div>
                
                    <div class="form-group <?php echo !empty(form_error('txtFullname'))?'has-error':'';?>">
                        <label for="name">FULLNAME:</label>
                        <input type="text" name="txtFullname" class="form-control" value="<?php echo set_value('txtFullname'); ?>">
                        <?php echo form_error('txtFullname','<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">PHONE:</label>
                        <input type="text" name="txtPhone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">ADDRESS:</label>
                        <input type="text" name="txtAddress" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="state">STATE:</label>
                        <select name="seleState" class="form-control">
                            <option value="1">ON</option>
                            <option value="0">OFF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnCreate" class="btn btn-primary btn-block btn-lg" value="CREATE CLIENT">
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

 
