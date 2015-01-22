<!DOCTYPE html>
<html>
<head>
    <?=$head?>
</head>
<body>
<?=$banner?>
<div class="category-title bg-primary">
    <div class="bg-primary"><?=$category['name']?></div>
    <?php if ($src['category_icon'] !== FALSE): ?>
    <img class="img-thumbnail" alt="<?=$category['name']?>" src="<?=base_url($src['category_icon'])?>">
    <?php endif?>
</div><!-- /.category-title -->
<div class="container">
    <!-- Start listing places -->
    <!-- TODO: implement paging if there's too many places -->
    <?php foreach ($places as $place): ?>
    <div class="row place-panel">
        <a class="" href="<?=site_url($href['places']['details'].'/'.$category['id'].'/'.$place['id'])?>">
            <div class="col-xs-3 col-sm-2 col-md-2">
                <?php // TODO: Use a helper to convert img link to thumbnail links ?>
                <?php if( ! empty($thumbnails) && isset($thumbnails[$place['id']])): ?>
                <img class="img-thumbnail place-panel-img" src="<?=base_url($thumbnails[$place['id']])?>" alt="<?=$place['name']?>">
                <?php endif ?>
            </div><!-- col-xs-3 -->
            <div class="col-xs-9 col-sm-8 col-md-8 place-panel-detail">
                <div class="row">
                    <div class="col-xs-12 col-md-12 place-panel-name">
                        <h4><?=$place['name']?></h4>
                    </div><!-- place-panel-name -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-xs-12 col-md-12 place-panel-rating">
                        <h4>
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <?php if ($place['rating'] > 0): ?>
                                <span class="glyphicon glyphicon-star"></span>
                            <?php else: ?>
                                <span class="glyphicon glyphicon-star-empty"></span>
                            <?php endif; ?>
                            <?php $place['rating']--; ?>
                        <?php endfor; ?>
                        </h4>
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </div><!-- /. place-panel-detail -->
            <div class="hidden-xs col-sm-2 col-md-2">
                <h1><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h1>
            </div><!-- /.hidden-xs -->
        </a>
    </div><!-- /.row -->
    <?php endforeach ?>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
