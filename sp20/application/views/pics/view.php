<!-- application/views/pics/view.php -->
<h2><?php echo $title; ?></h2>

<?php foreach ($pictures as $pic){
    $size = 'm';
    $photo_url = '
    http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';
                    
    echo "<img title='" . $pic->title . "' src='" . $photo_url . "' />";
}?>
