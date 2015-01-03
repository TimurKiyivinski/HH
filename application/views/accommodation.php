<!-- NOTE: Might be reusable for all categories -->
<!DOCTYPE html>
<html>
<head>
    <?=$head?>
</head>
<body>
<?=$banner?>
<!-- TODO: Add search UI -->
<div class="container">
    <div class="row category-title">
        <div class="bg-primary">
            <?=$category_display?>
        </div><!-- /.category-title -->
        <!-- TODO: load category images -->
        <img class="hidden-xs" alt="<?=$category?>" src="<?=base_url('public/images/icons/PlayButton.png')?>">
    </div>
    <!-- Start listing places -->
    <div class="row">
        <div class="list-group">
        <?php foreach ($places as $place): ?>
            <a class="list-group-item panel-place" href="<?=site_url($href['places']['details'].'/'.$category.'/'.$place['id'])?>">
                <div class="media">
                    <div class="media-left media-middle" href="<?=site_url($href['places']['details'].'/'.$category.'/'.$place['id'])?>">
                        <!-- TODO: load image from db -->
                        <img class="img-thumbnail thumbnail-place" src="<?=base_url('public/images/places/accommodation/Merdeka_Palace_Hotel.png')?>" alt="<?=$place['name']?>">
                    </div><!-- /.media-left -->
                    <div class="media-body place-list">
                        <h4 class="media-heading place-name"><?=$place['name']?>
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </h4>
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <?php if ($place['rating'] > 0): ?>
                                <img class="ratings-display" src="<?=base_url('public/images/icons/StarFilledButton.png')?>">
                            <?php else: ?>
                                <img class="ratings-display" src="<?=base_url('public/images/icons/StarHollowButton.png')?>">
                            <?php endif; ?>
                            <?php $place['rating']--; ?>
                        <?php endfor; ?>
                    </div><!-- /.media-body -->
                </div><!-- /.media -->
            </a>
        <?php endforeach ?>
        </div><!-- /.list-group -->
    </div><!-- /.row -->
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
