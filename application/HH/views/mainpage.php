<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>

<img src="public/images/base/homepage.png" class="img-responsive">
<hr class="mainpage" />

<div class="container">
    <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
        <a class="btn btn-category" href="<?=site_url($href['places']['categories'].'/'.$i)?>">
            <img class="category-btn" src="public/images/icons/hotspot_icon.png">
        </a>
    </div>
    <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
        <a class="btn btn-category" href="<?=site_url($href['places']['categories'].'/'.$i)?>">
            <img class="category-btn" src="public/images/icons/locate_icon.png">
        </a>
    </div>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>

