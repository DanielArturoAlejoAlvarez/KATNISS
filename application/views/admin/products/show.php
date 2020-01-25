<div class="row">
    <div class="col-md-6">
        <h3><strong>Category:</strong> <?php echo $product->CATE_Code; ?></h3>

        <h3><strong>Serial:</strong> <?php echo $product->PROD_Serial; ?></h3>

        <h3><strong>Name:</strong> <?php echo $product->PROD_Name; ?></h3>

        <h3><strong>Price:</strong> <?php echo $product->PROD_Price; ?></h3>

        <h3><strong>Stock:</strong> <?php echo $product->PROD_Stock; ?></h3>
    </div>
    <div class="col-md-6">
        <h3><strong>Image:</strong> <img class="img-responsive" src="<?php echo $product->PROD_Picture; ?>" alt="<?php echo $product->PROD_Name; ?>"></h3>
    </div>
</div>




