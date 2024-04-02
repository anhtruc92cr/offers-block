<?php
$deposits = $args['deposits'];
if (!empty($deposits)) :
    ?>
    <div class="swiper-container swiper-deposits-<?php echo $args["id"]; ?>">
        <div class="swiper-wrapper">
        <?php
        foreach($deposits as $deposit) :
        ?>
        <div class="swiper-slide">
            <img src="<?php echo $deposit->dark_url; ?>" alt="<?php echo $deposit->name; ?>">
        </div>
        <?php endforeach; ?>
        </div>
        <div class="swiper-pagination swiper-pagi-<?php echo $args["id"]; ?>"></div>
    </div>
<?php
endif;?>
<script>
jQuery(function ($) {
    $(function () {
        $(window).on('load', function() {
            console.log('slider')
            var mySwiper = new Swiper ('.swiper-deposits-<?php echo $args["id"]; ?>', {
                speed: 400,
                spaceBetween: 100,
                initialSlide: 0,
                autoHeight: false,
                direction: 'horizontal',
                pagination: {
                    el: '.swiper-pagination.swiper-pagi-<?php echo $args["id"]; ?>',
			        clickable: true
                },
                effect: 'slide',
                spaceBetween: 10,
                slidesPerView: 5,
                slidesOffsetBefore: 0,
                grabCursor: true,
                })
            console.log(mySwiper)
        })
    })
})
</script>