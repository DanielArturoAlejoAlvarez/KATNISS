
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
                <div class="messages">
                  <?php if ($this->session->flashdata("error")):?>          
                    <div class="alert alert-danger" role="alert">
                      <a href="#" class="alert-link"><?php echo $this->session->flashdata("error"); ?></a>
                    </div>        
                  <?php endif; ?> 
                </div>               
                <form action="<?php echo base_url();?>maintenance/clients/update" method="POST">
                    <input type="hidden" name="txtId" value="<?php echo $client->CLIE_Code; ?>">
                    
                    <div class="form-group">
                        <label for="client_type">CLIENT TYPE:</label>
                        <select name="seleClientType" class="form-control">
                            <?php foreach ($client_types as $ct): ?>                            
                            <option <?php echo $ct->CLT_Code==$client->CLT_Code?'selected':''; ?> value="<?php echo $ct->CLT_Code;?>"><?php echo $ct->CLT_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>  

                    <div class="form-group">
                        <label for="doc_type">DOC. TYPE:</label>
                        <select name="seleDocType" class="form-control">
                            <?php foreach ($doc_types as $dt): ?>                            
                            <option <?php echo $dt->DOC_Code==$client->DOC_Code?'selected':''; ?> value="<?php echo $dt->DOC_Code;?>"><?php echo $dt->DOC_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>  
                    
                    <div class="form-group <?php echo !empty(form_error('txtNumber'))?'has-error':'';?>">
                        <label for="name">NUMBER:</label>
                        <input type="text" name="txtNumber" class="form-control" value="<?php echo !empty(form_error('txtNumber')) ? set_value('txtNumber') : $client->CLIE_Number; ?>">
                        <?php echo form_error('txtNumber','<span class="help-block be-red">','</span>'); ?>
                    </div>
                    
                    <div class="form-group <?php echo !empty(form_error('txtRuc'))?'has-error':'';?>">
                        <label for="name">FULLNAME:</label>
                        <input type="text" name="txtFullname" class="form-control" value="<?php echo !empty(form_error('txtFullname')) ? set_value('txtFullname') : $client->CLIE_Fullname; ?>">
                        <?php echo form_error('txtFullname','<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">PHONE:</label>
                        <input type="text" name="txtPhone" class="form-control" value="<?php echo $client->CLIE_Phone; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">ADDRESS:</label>
                        <input type="text" name="txtAddress" class="form-control" value="<?php echo $client->CLIE_Address; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="state">STATE:</label>
                        <select name="seleState" class="form-control">
                            <option <?php echo $client->CLIE_Flag==1?'selected':''; ?> value="1">ON</option>
                            <option <?php echo $client->CLIE_Flag==0?'selected':''; ?> value="0">OFF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnCreate" class="btn btn-primary btn-block btn-lg" value="UPDATE CLIENT">
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

 
