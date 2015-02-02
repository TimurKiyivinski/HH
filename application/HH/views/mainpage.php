<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>
<img src="<?=base_url($href['base'])?>/homepage.png" class="img-responsive">
<hr class="mainpage" />
<div class="container">

    <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
        <div class="row">
            <a class="btn btn-category" href="<?=site_url($href['area'])?>">
                <img class="category-btn" src="<?=base_url($href['icon'])?>/hotspot_icon.png">
            </a>
        </div>
        <div class="row">
            <a class="btn btn-category-name" href="<?=site_url($href['area'])?>">
                Hotspots
            </a>
        </div>
    </div>

    <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
        <div class="row">
            <a class="btn btn-category" href="<?=site_url($href['map']['go'])?>">
                <img class="category-btn" src="<?=base_url($href['icon'])?>/locate_icon.png">
            </a>  
        </div>
        <div class="row">
            <a class="btn btn-category-name" href="<?=site_url($href['map']['go'])?>">
                Locate On Map
            </a>
        </div>
    </div>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
