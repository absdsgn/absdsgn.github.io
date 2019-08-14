<!DOCTYPE html>
<html>

    <?php require 'src/head.php'; ?>
    <?php $year = $_REQUEST['year']; ?>
    <?php $gallery = $_REQUEST['gallery']; ?>
    <?php $subgallery = $_REQUEST['subgallery']; ?>

    <?php $year = '2018'; ?>
    <?php $gallery = 'wedding'; ?>


    <body>
        <h1>Hallo!</h1>

        <?php if ( empty($year) ) : ?>
            <div class="wrapper">
                <h3>Pick a year</h3>
            </div>
        <?php endif; ?>

        <?php if ( !empty($year) && empty($gallery) ) : ?>
            <div class="wrapper">
                <h3>Pick a gallery</h3>
            </div>
        <?php endif; ?>

        <?php if ( !empty($year) && !empty($gallery) ) : 

            $checkDir = 'images/' . $year . '/' . $gallery . '/*';

            $subgalleryCount  = count( glob($checkDir, GLOB_ONLYDIR) );

            if ( $subgalleryCount > 1 ) {

                $subgalleries = glob($checkDir, GLOB_ONLYDIR);

                // foreach through subgallery options

            } elseif ( $subgalleryCount == 0 ) {

                $directory = 'images/' . $year . '/' . $gallery;

            } else {
                
                $directory = glob($directory, GLOB_ONLYDIR);

            }

        endif; ?>



        <div class="grid">
            <div class="grid-sizer"></div>
            <?php 
            $images = glob($directory . '/*.{jpg,png,gif}', GLOB_BRACE);
            $i = 1;
            $iTotal = count($images);
            foreach( $images as $image ) : 
            ?>
                <div class="grid-item">
                    <img src="<?php echo $image; ?>" class="<?php if( $i == 1 ) { echo 'first'; } elseif( $i == $iTotal ) { echo 'last'; } else { echo ''; } ?>" <?php echo 'id="' . $i . '"'; ?> />
                </div>
            <?php $i++;
            endforeach; ?>
        </div>
        <div class="lightbox" id="Lightbox">
            <div class="lightbox-overlay"></div>
            <div class="lightbox-wrapper">
                <div class="btn btn-close" id="LightboxClose"><i class="fas fa-times"></i></div>
                <img src="" id="LightboxImage" data-number="" />
                <div class="btn btn-prev" id="LightboxPrev"><i class="fas fa-chevron-left"></i></div>
                <div class="btn btn-next" id="LightboxNext"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </body>
    <footer>
        <script src="js/gallery.js"></script>
    </footer>
</html>