
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
                  <a href="<?php echo base_url();?>movements/sales/create" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;SALE</a>
                  <p>&nbsp;</p>
              </div>
            
              <div class="col-md-12">
                  <table id="example1" class="table table-striped table-bordered table-hover table-condensed">
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
                                                          
                              <th>&nbsp;</th>
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
                              
                              
                              <td>                               
                                  <button type="button" value="<?php echo $sale->SALE_Code; ?>" class="btn btn-sm btn-info view-details" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-search"></span> VIEW</button>
                              </td>
                              
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-default">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sale Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary pull-right view-printer">
          <span class="fa fa-print"></span> Print
        </button>
      </div>
    </div>
  </div>
</div>
 



