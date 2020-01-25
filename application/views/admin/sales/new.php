<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sale
      <small>New Sale</small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Form Sale</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>

      </div>

      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <a href="<?php echo base_url(); ?>movements/sales/index" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp;BACK</a>
            <p>&nbsp;</p>
          </div>

          <div class="col-md-12">

            <form action="<?php echo base_url(); ?>movements/sales/store" method="POST">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="client_type">VOUCHER TYPE:</label>
                    <select name="seleVoucherType" id="vouchers" class="form-control">
                      <option value="">Select one voucher type...</option>
                      <?php foreach ($voucher_types as $vt) : ?>
                        <?php $dataVoucher = $vt->VHR_Code . "*" . $vt->VHR_Qty . "*" . $vt->IGV . "*" . $vt->VHR_Serial; ?>
                        <option value="<?php echo $dataVoucher; ?>"><?php echo $vt->VHR_Name; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="idvoucher" id="idvoucher">
                    <input type="hidden" name="igv" id="igv">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="serial">SERIAL:</label>
                    <input type="text" name="txtSerial" id="serial" class="form-control" readonly>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="number">NUMBER:</label>
                    <input type="text" name="txtNumber" id="number" class="form-control" readonly>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="client">CLIENT:</label>
                    <div class="input-group">
                      <input type="search" name="client" id="client" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal2">
                          <i class="fa fa-search" aria-hidden="true"></i> Search!</button>
                      </span>
                    </div>
                    <input type="hidden" name="idclient" id="idclient">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="date">DATE:</label>
                    <input type="date" name="txtDate" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="product">Product:</label>
                    <input type="text" name="txtProduct" id="product" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-8">
                        <div>&nbsp;</div>
                        <button type="button" id="btnAddSale" class="btn btn-primary btn-md btn-block"><i class="fa fa-plus" aria-hidden="true"></i> CREATE SALE</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
         
            
              <table id="table-sale" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>CODE</th>
                    <th>NAME</th>
                    <th>PRICE($/.)</th>
                    <th>STOCK</th>
                    <th>QTY</th>
                    <th>AMOUNT($/.)</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            
          
              <div class="row">
                <div class="col-md-3">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Subtotal:</span>
                    <input type="text" name="subtotal" class="form-control" placeholder="0.00" aria-describedby="basic-addon1" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">IGV:</span>
                    <input type="text" name="nigv" class="form-control" placeholder="0.00" aria-describedby="basic-addon2" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">Discount:</span>
                    <input type="text" name="discount" class="form-control" placeholder="0.00" aria-describedby="basic-addon3" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon4">Total</span>
                    <input type="text" name="total" class="form-control" placeholder="0.00" aria-describedby="basic-addon4" readonly>
                  </div>
                </div>
              </div>

          
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <div>&nbsp;</div>
                    <input type="submit" id="btnCreate" class="btn btn-md btn-success btn-block" value="SAVE">
                  </div>
                </div>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-default">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="example1" class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>FULLNAME</th>
              <th>NUMBER</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($clients as $client) : ?>

              <tr>
                <td><?php echo $client->CLIE_Code; ?></td>
                <td><?php echo $client->CLIE_Fullname; ?></td>
                <td><?php echo $client->CLIE_Number; ?></td>

                <?php $dataClient = $client->CLIE_Code . "*" . $client->CLIE_Fullname . "*" . $client->CLIE_Number; ?>
                <td>
                  <button type="button" value="<?php echo $dataClient; ?>" class="btn btn-success btn-check"><i class="fa fa-check" aria-hidden="true"></i> CHECK</button>
                </td>
              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>