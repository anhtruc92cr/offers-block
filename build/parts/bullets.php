<?php
$bullet_points = $args['bullet_points'];
?>
<ul>
<?php if (!empty($bullet_points?->one?->title)) : ?>
<li class="flex align-center">
    <i class="fa fa-check"></i>
    <p><?php echo $bullet_points?->one->title; ?></p>
</li>
<?php endif; ?>
<?php if (!empty($bullet_points?->two?->title)) : ?>
<li class="flex align-center">
    <i class="fa fa-check"></i>
    <p><?php echo $bullet_points->two?->title; ?></p>
</li>
<?php endif; ?>
<?php if (!empty($bullet_points?->three?->title)) : ?>
<li class="flex align-center">
    <i class="fa fa-check"></i>
    <p><?php echo $bullet_points?->three?->title; ?></p>
</li>
<?php endif; ?>
<?php if (!empty($bullet_points?->four?->title)) : ?>
<li class="flex align-center">
    <i class="fa fa-check"></i>
    <p><?php echo $bullet_points?->four?->title; ?></p>
</li>
<?php endif; ?>
</ul>