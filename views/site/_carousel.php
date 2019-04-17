<?php
/** @var  app\models\CarouselData $modelCarouselData */
?>
<!-- CAROUSEL - START -->

<!-- Wrapper for slides -->
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <?php foreach ($modelCarouselData as $key => $cl_item): ?>
            <li data-target="#demo"
                data-slide-to="<?= $key ?>" <?php if (!$key): ?> class="active" <?php endif; ?>></li>
        <?php endforeach; ?>
    </ul>
    <div class="carousel-inner">
        <?php foreach ($modelCarouselData as $key => $cl_item): ?>
            <div class="carousel-item <?php if ($key == 0) echo 'active'; ?>">
                <img src="<?= $cl_item->img_banner ?>" alt="<?= $cl_item->title ?>">
                <!--                    <div class="carousel-caption">-->
                <!--                        <h3>Los Angeles</h3>-->
                <!--                        <p>We had such a great time in LA!</p>-->
                <!--                    </div>-->
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
</a>
</div>

<!-- CAROUSEL - END -->