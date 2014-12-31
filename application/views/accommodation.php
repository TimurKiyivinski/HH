<html>
<head>
    <?=$head?>
</head>
<body>
<?=$navbar?>
<div class="container">
    <?php foreach ($places as $place): ?>
    <div class="row">
        <a href="<?=site_url($href['places']['details'].'/'.$category.'/'.$place['id'])?>">
            <div class="col-xs-12 list main-content">
                <div class="col-xs-2 content">
                    <img class="thumb-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg">
                </div>
                <div class="col-xs-9 list-description">
                    <h1><?=$place['name']?></h1><br>
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <?php if ($place['rating'] > 0): ?>
                            <img class = "ratings" src="<?=base_url("public/images/StarFilledButton.png")?>">
                        <?php else: ?>
                            <img class = "ratings" src="<?=base_url('public/images/StarHollowButton.png')?>">
                        <?php endif; ?>
                        <?php $place['rating']--; ?>
                    <?php endfor; ?>
                    <br>
                </div>
            </div>
        </a>
    </div><!-- /.row -->
    <?php endforeach ?>
</div><!-- /.container -->
<br>
<br>
<?=$foot?>
</body>
</html>
