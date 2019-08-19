<?php 

$nav = array(
    array(
        'name' => 'Home',
        'page' => 'index.php'
    ),
    array(
        'name' => 'Gallery',
        'page' => 'gallery.php'
    ),
);
?>
<nav class="nav">

    <div class="wrapper nav-wrapper">

        <div class="nav-logo">
            <h1>ABS Family</h1>
        </div>

        <div class="nav-menu">
            
            <?php foreach($nav as $item) : ?>

                <a class="nav-link" href="<?php echo $item['page']; ?>"><?php echo $item['name']; ?></a>

            <?php endforeach; ?>

        </div>
    </div>
</nav>