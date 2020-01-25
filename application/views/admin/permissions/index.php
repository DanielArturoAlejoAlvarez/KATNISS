
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
        Permissions
        <small>List Permission</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Table of Permissions</h3>

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
                  <a href="<?php echo base_url();?>administration/permissions/create" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;PERMISSION</a>
                  <p>&nbsp;</p>
              </div>
            
              <div class="col-md-12">
                  <table id="example1" class="table table-striped table-bordered table-hover table-condensed">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>MENU</th>
                              <th>ROLE</th>
                              <th>CREATE</th>
                              <th>READ</th>
                              <th>UPDATE</th>
                              <th>DELETE</th> 
                                                          
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($permissions as $permission):?>
                           
                          <tr>
                              <td><?php echo $permission->PERMI_Code; ?></td>
                              <td><?php echo $permission->menu; ?></td>
                              <td><?php echo $permission->role; ?></td>
                              <td><?php echo $permission->PERMI_Create; ?></td>
                              <td><?php echo $permission->PERMI_Read; ?></td>
                              <td><?php echo $permission->PERMI_Update; ?></td>
                              <td><?php echo $permission->PERMI_Delete; ?></td>
                              
                              
                               <td>                               
                                  <button type="button" value="<?php echo $permission->PERMI_Code; ?>" class="btn btn-sm btn-info view-permission" data-toggle="modal" data-target="#exampleModal">VIEW</button>
                              </td>
                              <td>                               
                                  <a href="<?php echo base_url(); ?>administration/permissions/edit/<?php echo $permission->PERMI_Code; ?>" class="btn btn-sm btn-warning">EDIT</a>
                              </td>
                              <td>
                                  <a href="<?php echo base_url();?>administration/permissions/delete/<?php echo $permission->PERMI_Code; ?>" class="btn btn-sm btn-danger btn-remove-PERMInt">DELETE</a>
                              </td>
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
        <h5 class="modal-title" id="exampleModalLabel">Permission Info</h5>
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
 
