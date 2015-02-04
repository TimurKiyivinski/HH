<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>

<div class="col-xs-12 col-md-12 col-sm-12 col-dm-12">
    <img src="<?=base_url($href['base'])?>/homepage.png" class ="img-responsive ">
</div>
<div class="clearfix"></div>
    <div class="hr"></div>



<div class="container">
    <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
        <div class="row">
            <a class="btn btn-category" href="<?=site_url($href['area'])?>">
                <img class="category-btn" src="<?=base_url($href['icon'])?>/hotspot_icon.png">
            </a>
        </div>
        <div class="row">
            <a  href="<?=site_url($href['area'])?>">
                Areas
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
            <a  href="<?=site_url($href['map']['go'])?>">
                Locate On Map
            </a>
        </div>
    </div>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
