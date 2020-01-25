
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
        Sales
        <small>List Sale</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Table of Sales</h3>

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
                <div class="row">
                  <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                    <div class="form-group">
                      <label for="fechaini" class="col-md-1 control-label">From: </label>
                      <div class="col-md-3">                        
                        <input type="date" name="fechaini" id="fechaini" value="<?php echo !empty($fechaini) ? $fechaini : ''; ?>" class="form-control">
                      </div>
                      <label for="fechafin" class="col-md-1 control-label">From: </label>
                      <div class="col-md-3">                        
                        <input type="date" name="fechafin" id="fechafin" value="<?php echo !empty($fechafin) ? $fechafin : ''; ?>" class="form-control">
                      </div>
                      <div class="col-md-4">
                        <input type="submit" name="search" value="Search" class="btn btn-primary">
                        <a href="<?php echo base_url();?>reports/sales/index" class="btn btn-danger">Restart</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              
            
              <div class="col-md-12">
                  <table style="width:100%" id="example" class="display nowrap table table-striped table-bordered table-hover table-condensed">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>CLIENT</th>
                              <th>VOUCHER</th>
                              <th>NUMBER</th>
                              <th>USER</th>
                              <th>DATE</th>
                              <th>TOTAL</th>
                              <th>IGV</th>                              
                              <th>SERIAL</th> 
                                                          
                              
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($sales as $sale):?>
                           
                          <tr>
                              <td><?php echo $sale->SALE_Code; ?></td>
                              <td><?php echo $sale->client; ?></td>
                              <td><?php echo $sale->voucher_type; ?></td>
                              <td><?php echo $sale->SALE_Number; ?></td>
                              <td><?php echo $sale->user; ?></td>
                              <td><?php echo $sale->SALE_Date; ?></td>
                              <td><?php echo $sale->SALE_Total; ?></td>
                              <td><?php echo $sale->igv; ?></td>
                              <td><?php echo $sale->SALE_Serial; ?></td>
                              
                              
                              
                              
                          </tr>

                          <?php endforeach; ?>
                      </tbody>
                  </table>
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




