
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>New Product</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Product</h3>

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
                  <a href="<?php echo base_url();?>maintenance/products/index" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;BACK</a>
                  <p>&nbsp;</p>
              </div>
            
              <div class="col-md-12">
                 
                <form action="<?php echo base_url();?>maintenance/products/store" method="POST">
                    <div class="form-group">
                        <label for="category">CATEGORY:</label>
                        <select name="seleCategory" class="form-control">
                            <?php foreach ($categories as $category): ?>                            
                            <option value="<?php echo $category->CATE_Code;?>"><?php echo $category->CATE_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>                
                    <div class="form-group <?php echo !empty(form_error('txtSerial'))?'has-error':'';?>">
                        <label for="serial">Serial:</label>
                        <input type="text" name="txtSerial" class="form-control" value="<?php echo set_value('txtSerial'); ?>">
                        <?php echo form_error('txtSerial','<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group <?php echo !empty(form_error('txtName'))?'has-error':'';?>">
                        <label for="name">Name:</label>
                        <input type="text" name="txtName" class="form-control" value="<?php echo set_value('txtName'); ?>">
                        <?php echo form_error('txtName','<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="excerpt">EXCERPT:</label>
                        <input type="text" name="txtExcerpt" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="desc">DESCRIPTION:</label>
                        <textarea name="txtDesc" class="form-control"></textarea>
                    </div>
                    <div class="form-group  <?php echo !empty(form_error('txtPrice')) ? 'has-error' : ''; ?>">
                        <label for="price">PRICE:</label>
                        <input type="text" name="txtPrice" class="form-control" value="<?php echo set_value('txtPrice'); ?>">
                        <?php echo form_error('txtPrice', '<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group  <?php echo !empty(form_error('txtStock')) ? 'has-error' : ''; ?>">
                        <label for="stock">STOCK:</label>
                        <input type="text" name="txtStock" class="form-control" value="<?php echo set_value('txtStock'); ?>">
                        <?php echo form_error('txtStock', '<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="picture">URL PICTURE:</label>
                        <input type="text" name="txtPicture" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="state">STATE:</label>
                        <select name="seleState" class="form-control">
                            <option value="1">ON</option>
                            <option value="0">OFF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnCreate" class="btn btn-primary btn-block btn-lg" value="CREATE PRODUCT">
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

 
