
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>Edit Product</small>
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
                <div class="messages">
                  <?php if ($this->session->flashdata("error")):?>          
                    <div class="alert alert-danger" role="alert">
                      <a href="#" class="alert-link"><?php echo $this->session->flashdata("error"); ?></a>
                    </div>        
                  <?php endif; ?> 
                </div>
                <form action="<?php echo base_url();?>maintenance/products/update" method="POST">
                    <input type="hidden" name="txtId" value="<?php echo $product->PROD_Code;?>">                
                    <div class="form-group">
                        <label for="category">CATEGORY:</label>
                        <select name="seleCategory" class="form-control">
                            <?php foreach ($categories as $category): ?>                            
                            <option <?php echo $product->PROD_Flag==$category->CATE_Code?'selected':''; ?> value="<?php echo $category->CATE_Code;?>"><?php echo $category->CATE_Name;?></option>
                            <?php endforeach;?>                            
                        </select>
                    </div>                
                    <div class="form-group <?php echo !empty(form_error('txtSerial')) ? 'has-error' : ''; ?>">
                        <label for="serial">SERIAL:</label>
                        <input type="text" name="txtSerial" class="form-control" value="<?php echo !empty(form_error('txtSerial')) ? set_value('txtSerial') : $product->PROD_Serial;?>">
                        <?php echo form_error('txtSerial', '<span class="help-block be-red">','</span>'); ?>
                    </div>                
                    <div class="form-group <?php echo !empty(form_error('txtName')) ? 'has-error' : ''; ?>">
                        <label for="name">NAME:</label>
                        <input type="text" name="txtName" class="form-control" value="<?php echo !empty(form_error('txtName')) ? set_value('txtName') : $product->PROD_Name;?>">
                        <?php echo form_error('txtName', '<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="excerpt">EXCERPT:</label>
                        <input type="text" name="txtExcerpt" class="form-control" value="<?php echo $product->PROD_Excerpt;?>">
                    </div>
                    <div class="form-group">
                        <label for="desc">DESCRIPTION:</label>
                        <textarea name="txtDesc" class="form-control"><?php echo $product->PROD_Desc;?></textarea>
                    </div>
                    <div class="form-group <?php echo !empty(form_error('txtPrice')) ? 'has-error' : ''; ?>">
                        <label for="price">PRICE:</label>
                        <input type="text" name="txtPrice" class="form-control" value="<?php echo !empty(form_error('txtPrice')) ? set_value('txtPrice') : $product->PROD_Price;?>">
                        <?php echo form_error('txtPrice', '<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group <?php echo !empty(form_error('txtStock')) ? 'has-error' : ''; ?>">
                        <label for="stock">STOCK:</label>
                        <input type="text" name="txtStock" class="form-control" value="<?php echo !empty(form_error('txtStock')) ? set_value('txtStock') : $product->PROD_Stock;?>">
                        <?php echo form_error('txtStock', '<span class="help-block be-red">','</span>'); ?>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                            <?php if($product->PROD_Picture): ?>
                                <img class="img-responsive" src="<?php echo $product->PROD_Picture;?>" alt="<?php echo $product->PROD_Name;?>">
                            <?php endif;?>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <label for="picture">URL PICTURE:</label>
                        <input type="text" name="txtPicture" class="form-control" value="<?php echo $product->PROD_Picture;?>">
                    </div>
                    <div class="form-group">
                        <label for="state">STATE:</label>
                        <select name="seleState" class="form-control">
                            <option <?php echo $product->PROD_Flag==1?'selected':''; ?> value="1">ON</option>
                            <option <?php echo $product->PROD_Flag==0?'selected':''; ?> value="0">OFF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnCreate" class="btn btn-primary btn-block btn-lg" value="UPDATE PRODUCT">
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

 
