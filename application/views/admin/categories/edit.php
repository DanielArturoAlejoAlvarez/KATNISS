
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>Edit Category</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Category</h3>

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
              <a href="<?php echo base_url();?>maintenance/categories/index" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;BACK</a>
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
                <form action="<?php echo base_url();?>maintenance/categories/update" method="POST">
                    <input type="hidden" name="txtId" value="<?php echo $category->CATE_Code; ?>">
                    <div class="form-group <?php echo !empty(form_error('txtName')) ? 'has-error' : ''; ?>">
                        <label for="name">NAME:</label>
                        <input type="text" name="txtName" class="form-control" value="<?php echo !empty(form_error('txtName')) ? set_value('txtName') : $category->CATE_Name; ?>">
                        <?php echo form_error('txtName','<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">BODY:</label>
                        <input type="text" name="txtDesc" class="form-control" value="<?php echo $category->CATE_Desc; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">STATE:</label>
                        <select name="seleState" class="form-control">
                            <option <?php echo $category->CATE_Flag==1?'selected':''; ?> value="1">ON</option>
                            <option <?php echo $category->CATE_Flag==0?'selected':''; ?> value="0">OFF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnUpdate" class="btn btn-primary btn-block btn-lg" value="UPDATE CATEGORY">
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

 
