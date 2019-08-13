<!DOCTYPE html>
<html>

    <?php require 'src/head.php'; ?>

    <?php $gallery = $_REQUEST['gallery']; ?>

    <body>
        <h1>Hallo!</h1>
        <div class="grid">

            <?php 
            $images = glob('images/2018/' . $gallery . '/*.{jpg,png,gif}', GLOB_BRACE);
            foreach( $images as $image ) : ?>
                <div class="grid-item">
                    <img src="<?php echo $image; ?>" class="" />
                </div>
            <?php endforeach; ?>
        </div>
    </body>
    <footer>
    </footer>
</html>