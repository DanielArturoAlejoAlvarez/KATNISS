

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <h3 class="text-center">CLIENT <?php echo $sale->CLIE_Code; ?></h3></th>
            
            <tr>
                <th>FULLNAME:</th>
                <td><?php echo $sale->CLIE_Fullname; ?></td>
            </tr>
            <tr>
                <th>ADDRESS:</th>
                <td><?php echo $sale->CLIE_Address; ?></td>
            </tr>
            <tr>
                <th>PHONE:</th>
                <td><?php echo $sale->CLIE_Phone; ?></td>
            </tr>
            <tr>
                <th>NUMBER:</th>
                <td><?php echo $sale->CLIE_Number; ?></td>
            </tr>
        </table>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <h3 class="text-center">VOUCHER <?php echo $sale->VHR_Code; ?></h3>
            <tr>
                <th>TYPE:</th>
                <td><?php echo $sale->VHR_Name; ?></td>
            </tr>
            <tr>
                <th>SERIAL:</th>
                <td><?php echo $sale->SALE_Serial; ?></td>
            </tr>
            <tr>
                <th>NUMBER:</th>
                <td><?php echo $sale->SALE_Number; ?></td>
            </tr>
            <tr>
                <th>DATE:</th>
                <td><?php echo date('l jS \of F Y',strtotime($sale->SALE_Date)); ?></td>
            </tr>
        </table>
    </div>
</div>
        

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">DETAILS SALE <td><?php echo $sale->SALE_Code; ?></h3>
        <table class="table table-striped table-hover table-bordered  table-condensed">
            <thead>
                <tr>
                    <th>CODE</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $subtotal=0;
                foreach($details as $det): ?>
                <tr>
                    <td><?php echo $det->PROD_Code; ?></td>
                    <td><?php echo $det->PROD_Name; ?></td>
                    <td><?php echo $det->PROD_Price; ?></td>
                    <td><?php echo $det->DETA_Qty; ?></td>
                    <td><?php echo $det->DETA_Subtotal; ?></td>
                    <?php $subtotal += $det->DETA_Subtotal; ?>
                </tr> 
                               
                <?php endforeach; ?>                
                
                <tr>
                    <th class="text-center" colspan="4">AMOUNT:</th>
                    <td><strong>$/. <?php echo $subtotal; ?></strong></td>
                </tr>

                <tr>
                    <th class="text-center" colspan="4">+IGV :</th>
                    <td>$/. <?php echo $sale->SALE_IGV; ?></td>
                </tr>

                <tr>
                    <th class="text-center" colspan="4">TOTAL:</th>
                    <td style="background-color: #e08e0b;"><h3>$/. <?php echo $sale->SALE_Total; ?></h3></td>
                </tr>


            </tbody>
        </table>
    </div>
</div>