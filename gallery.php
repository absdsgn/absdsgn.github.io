<!DOCTYPE html>
<html>

    <?php require 'src/head.php'; ?>
    <?php $year = ''; $gallery = ''; $subgallery = ''; ?>
    <?php $year = $_REQUEST['y']; ?>
    <?php $gallery = $_REQUEST['g']; ?>
    <?php $subgallery = $_REQUEST['sg']; ?>

    <body>

        <?php if ( empty($year) ) : ?>
            <div class="wrapper">
                <h3>First, pick a year.</h3>

                <?php
                $years = glob('images/*', GLOB_ONLYDIR);

                foreach($years as $yr) : ?>

                    <?php $yr = substr($yr, 7); ?>

                    <a href="gallery.php?y=<?php echo $yr; ?>" class="btn btn-primary"><?php echo $yr; ?></a>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( !empty($year) && empty($gallery) ) : ?>
            <div class="wrapper">
                <h3>Alright, now pick a gallery.</h3>

                <?php
                $galleries = glob('images/' . $year . '/*', GLOB_ONLYDIR);

                foreach($galleries as $gal) : ?>

                    <?php 
                        $trimAdd = strlen($year);
                        $trim = '8' + $trimAdd;
                        $gal = substr($gal, $trim); 
                    ?>

                    <a href="gallery.php?y=<?php echo $year; ?>&g=<?php echo $gal; ?>" class="btn btn-primary"><?php echo $gal; ?></a>

                <?php endforeach; ?>

            </div>
        <?php endif; ?>

        <?php if ( !empty($year) && !empty($gallery) ) :

            $checkDir = 'images/' . $year . '/' . $gallery . '/*';

            $subgalleryCount  = count( glob($checkDir, GLOB_ONLYDIR) );

            if ( $subgalleryCount > 1 ) { ?>

                <div class="wrapper">
                    <?php if ( empty($subgallery) ) { ?>
                        <h3>Lastly, narrow it down.</h3>
                    <?php } else { ?>
                        <h3>Change it up.</h3>
                    <?php } ?>

                    <?php $subgalleries = glob($checkDir, GLOB_ONLYDIR);

                    foreach( $subgalleries as $subg ) : ?>

                            <?php 
                                $trimAdd = strlen($gallery);
                                $trim = '13' + $trimAdd;
                                $subg = substr($subg, $trim); 
                            ?>

                            <a href="gallery.php?y=<?php echo $year; ?>&g=<?php echo $gallery; ?>&sg=<?php echo $subg; ?>" class="btn btn-primary"><?php echo $subg; ?></a>

                    <?php endforeach; ?>

                </div>

            <?php } elseif ( $subgalleryCount == 0 ) {

                $directory = 'images/' . $year . '/' . $gallery;

            } else {
                
                $directory = glob($directory, GLOB_ONLYDIR);

            }

        endif; ?>

        <?php if ( !empty($year) && !empty($gallery) && !empty($subgallery) ) :

            $directory = 'images/' . $year . '/' . $gallery . '/' . $subgallery;

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