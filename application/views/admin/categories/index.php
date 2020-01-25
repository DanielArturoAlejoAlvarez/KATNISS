
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="messages">
        <?php if ($this->session->flashdata("success")):?>          
          <div class="alert alert-success" role="alert">
            <a href="#" class="alert-link"><?php echo $this->session->flashdata("success"); ?></a>
          </div>
        <?php endif; ?>
      </div>
      <h1>
        Categories
        <small>List Category</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Table of Categories</h3>

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
                  <?php if($permissions->PERMI_Create == 1):?>
                  <a href="<?php echo base_url();?>maintenance/categories/create" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;CATEGORY</a>
                  <?php endif; ?>
                  <p>&nbsp;</p>
              </div>
            
              <div class="col-md-12">
                  <table id="example1" class="table table-striped table-bordered table-hover table-condensed">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>NAME</th>
                              <th>DESCRIPTION</th>                              
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($categories as $category):?>
                           
                          <tr>
                              <td><?php echo $category->CATE_Code; ?></td>
                              <td><?php echo $category->CATE_Name; ?></td>
                              <td><?php echo strlen($category->CATE_Desc)>100?substr($category->CATE_Desc,0,100).'...':$category->CATE_Desc; ?></td>
                              
                              <td>                               
                                  <button type="button" value="<?php echo $category->CATE_Code; ?>" class="btn btn-sm btn-info btn-view-category" data-toggle="modal" data-target="#exampleModal">VIEW</button>
                              </td>
                              <?php if($permissions->PERMI_Update == 1):?>
                              <td>                               
                                  <a href="<?php echo base_url(); ?>maintenance/categories/edit/<?php echo $category->CATE_Code; ?>" class="btn btn-sm btn-warning">EDIT</a>
                              </td>
                              <?php endif; ?>
                              <?php if($permissions->PERMI_Delete == 1):?>
                              <td>
                                  <a href="<?php echo base_url();?>maintenance/categories/delete/<?php echo $category->CATE_Code; ?>" class="btn btn-sm btn-danger btn-remove-category">DELETE</a>
                              </td>
                              <?php endif; ?>
                          </tr>

                          <?php endforeach; ?>
                      </tbody>
                  </table>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-default">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
 
