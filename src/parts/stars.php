<?php
$stars = $args['stars'];
?>
<div class="stars">
    <?php for ($i = 1; $i <= 5; $i++) : 
        $star = "fa-star";
        if ($i == $stars+0.5) {
            $star = "fa-star-half-alt";
        } ?>
    <span class="fa <?php echo $star; echo ($i <= $stars) ? ' checked' : ''; ?>"></span>
    <?php endfor; ?>
</div>