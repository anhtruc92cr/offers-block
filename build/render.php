<?php
include_once(TN_PLUGIN_PATH . 'inc/api/class-api.php');
include_once(TN_PLUGIN_PATH . 'inc/helpers.php');
use TNAPI\APIReader; 

$api_url = $attributes['apiUrl'] ?? '';
$api_reader = new APIReader($api_url);
$data = $api_reader->get_data();
$result = $data?->record?->offers;
?>
<div class="offers-block-wrapper">
    <div class="offers-block-outline">
        <?php if(!empty($result)) :
            foreach ($result as $row) :
                $bullet_points = $row?->bullet_points ?? [];
            ?>
                <div class="offers-inner">
                    <?php if (!empty($row?->ribbon)) : ?>
                    <div class="offers-ribbon">
                        <p><?php echo $row?->ribbon; ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="offers-block flex justify-between align-center text-center">
                        <div class="offers-logo w-17">
                            <img src="<?php echo $row?->logo?->dark; ?>" alt="<?php echo $row?->logo?->alt; ?>" />
                        </div>
                        <div class="offers-headlines flex flex-column w-17">
                            <?php $headlines = $row?->headlines ?? [];
                            tn_get_template_part(dirname(__FILE__) . '/parts/headlines.php', [
                                "headlines" => $headlines
                            ]);
                            ?>
                        </div>
                        <div class="offers-rating w-30">
                            <?php $stars = $row?->stars ?? 5;
                            tn_get_template_part(dirname(__FILE__) . '/parts/stars.php', [
                                "stars" => $stars
                            ]);
                            ?>
                            <div class="carousel-logos">
                                <?php $deposits = $row?->deposits ?? [];
                                tn_get_template_part(dirname(__FILE__) . '/parts/carousel.php', [
                                    "deposits" => $deposits,
                                    "id" => $row?->offer_id
                                ]);
                                ?>
                            </div>
                        </div>
                        <div class="offers-properties w-17 text-left">
                                <?php $bullet_points = $row?->bullet_points ?? [];
                                tn_get_template_part(dirname(__FILE__) . '/parts/bullets.php', [
                                    "bullet_points" => $bullet_points
                                ]);
                                ?>
                        </div>

                        <div class="offers-cta w-17">
                            <div class="play-btn">
                                <a href="<?php echo $row?->links?->offer; ?>"><?php echo $row?->cta?->one; ?></a>
                            </div>
                            <div class="others">
                                <a href="<?php echo $row?->links?->terms; ?>" class="cta"><?php echo $row?->cta?->two; ?></a>
                                <a href="<?php echo $row?->links?->review; ?>" class="cta">Review</a>
                            </div>
                        </div>
                    </div>
                    <div class="preview-img">
                        <a href="<?php echo $row?->preview_image?->large_url; ?>" target="_blank" class="preview-link"><i class="fa fa-image"></i> Preview</a>
                    </div>
                    <div class="offers-brand">
                        <p>
                            <span><?php echo $row?->fine_print; ?></span>
                            <span><?php echo $row?->disclaimer; ?></span>
                        </p>
                    </div>
                </div>
        <?php endforeach;
            else : ?>
            <div class="empty">
                There is no data to show.
            </div>
        <?php endif;?>
    </div>
</div>