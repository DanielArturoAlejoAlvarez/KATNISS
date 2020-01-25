
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                  <div class="inner">
                      <h3><?php echo $clients; ?></h3>

                      <p>CLIENTS</p>
                  </div>
                  <div class="icon">
                  <ion-icon name="basket"></ion-icon>
                  </div>
                  <a href="<?php echo base_url(); ?>maintenance/clients" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3><?php echo $products; ?><sup style="font-size: 20px">%</sup></h3>

                      <p>PRODUCTS</p>
                  </div>
                  <div class="icon">
                    
                    <ion-icon name="stats"></ion-icon>
                  </div>
                  <a href="<?php echo base_url(); ?>maintenance/products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                  <div class="inner">
                      <h3><?php echo $users; ?></h3>

                      <p>USERS</p>
                  </div>
                  <div class="icon">
                    <ion-icon name="person-add"></ion-icon>
                  </div>
                  <a href="<?php echo base_url(); ?>administration/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                  <div class="inner">
                      <h3><?php echo $sales; ?></h3>

                      <p>SALES</p>
                  </div>
                  <div class="icon">
                    <ion-icon name="pie"></ion-icon>
                  </div>
                  <a href="<?php echo base_url(); ?>movements/sales" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Monthly Recap Report</h3>

                      <div class="box-tools pull-right">
                        <select name="year" id="year" class="form-control">
                          <?php foreach ($years as $year):?>
                           <option value="<?php echo $year->year; ?>"><?php echo $year->year; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div id="drawStatsColumns" style="margin: 0 auto;">
                                  
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div id="drawStatsPie" style="margin: 0 auto;">
                                  
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div id="drawStatsLine" style="margin: 0 auto;">
                                  
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div id="drawStatsArea" style="margin: 0 auto;">
                                  
                              </div>
                          </div>
                      </div>
                      <!-- /.row -->
                  </div>
                  <!-- ./box-body -->
              </div>
              <!-- /.box -->
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
