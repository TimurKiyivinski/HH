<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>
<!-- TODO: Add Search UI -->
<div class="container">
    <?php foreach ($categories as $category): ?>
    <div class="row category-panel">
        <a class="" href="<?=site_url($href['places']['list'].'/'.$category['id'])?>">
            <div class="col-xs-3 col-sm-2 col-md-2">
                <img class="category-panel-img" src="<?=base_url("public/images/icons/".url_title($category['name'], '_', TRUE)."_icon.png")?>" alt="">
            </div><!-- col-xs-3 -->
            <div class="col-xs-9 col-sm-8 col-md-8 cateogry-panel-detail">
                <h3><?=$category['name']?></h3>
            </div><!-- /. category-panel-detail -->
            <div class="hidden-xs col-sm-2 col-md-2">
                <h3><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h3>
            </div><!-- /.hidden-xs -->
        </a>
    </div><!-- /.row -->
    <?php endforeach ?>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>

