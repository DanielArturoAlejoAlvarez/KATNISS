<div class="row">
    <div class="col-md-6">
        <h3><strong>FULLNAME:</strong> <?php echo $user->USER_Fullname; ?></h3>

        <h3><strong>EMAIL:</strong> <?php echo $user->USER_Email; ?></h3>

        <h3><strong>USERNAME:</strong> <?php echo $user->USER_Username; ?></h3>

        <h3><strong>ROLE:</strong> <?php echo $user->role; ?></h3>

        <h3><strong>STATE:</strong> 
        <?php 
            switch ($user->USER_Flag) {
                case '1':
                    echo '<span class="label label-primary">ACTIVE</span>';
                    break;
                case '0':
                    echo 'INACTIVE';
                    break;
                
                default:
                    break;
            }
        ?>
        </h3>
    </div>
    <div class="col-md-6">
        <h3><strong>AVATAR:</strong> <img class="img-responsive" src="<?php echo $user->USER_Avatar; ?>" alt="<?php echo $user->USER_Fullname; ?>"></h3>
    </div>
</div>

