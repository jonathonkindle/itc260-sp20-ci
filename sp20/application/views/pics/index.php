<!-- application/views/pics/index.php  -->

<h2><?php echo $title; ?></h2>

<?php foreach ($pics as $pictures): ?>

        <h3><?php echo $pictures['title']; ?></h3>
        <div class="main">
                <?php echo $pictures['text']; ?>
        </div>
        <p><a href="<?php echo site_url('pics/'.$pictures['slug']); ?>">View Pictures</a></p>

<?php endforeach;?>