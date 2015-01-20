<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>



<div class="container">

    <div class="row search-bar bg-primary">
        <div class="col-xs-12 col-sm-12 col-dm-12">
            <?=form_open(current_url(), array('method' => 'get', 'class' => 'form-horizontal', 'role' => 'form'))?>
                <div class="input-group">
                    <input name="search" class="text form-control" value="<?=$this->input->get('search')?>" type="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-search">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </span>
                </div><!-- /.input-group -->
            </form>
        </div>
    </div><!-- /.row -->

    <div class="row ">
        <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
            <a class="btn btn-category" href="<?=site_url($href['map'])?>">
                <img class="category-btn" src="<?=base_url('public/images/icons/carpenter_street_icon.png')?>">
            </a>
        </div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
            <a class="btn btn-category" href="<?=site_url($href['map'])?>">
                <img class="category-btn" src="<?=base_url('public/images/icons/main_bazzar_icon.png')?>">
            </a>
        </div>
    </div><!-- /.row -->
    <div class="row ">
        <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
            <a class="btn btn-category" href="<?=site_url($href['map'])?>">
                <img class="category-btn" src="<?=base_url('public/images/icons/old_market_icon.png')?>">
            </a>
        </div>
        <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
            <a class="btn btn-category" href="<?=site_url($href['map'])?>">
                <img class="category-btn" src="<?=base_url('public/images/icons/plaza_merdeka_icon.png')?>">
            </a>
        </div>
    </div><!-- /.row -->
<!-- 
    <div class="row ">
        <a class="btn btn-category col-md-5" href="<?=site_url($href['map'])?>">
            <img class="category-btn" src="<?=base_url('public/images/icons/carpenter_street_icon.png')?>">
        </a>
        <a class="btn btn-category col-md-5" href="<?=site_url($href['map'])?>">
            <img class="category-btn" src="<?=base_url('public/images/icons/main_bazzar_icon.png')?>">
        </a>
    </div>
    <div class="row ">
        <a class="btn btn-category col-md-5" href="<?=site_url($href['map'])?>">
            <img class="category-btn" src="<?=base_url('public/images/icons/old_market_icon.png')?>">
        </a>
        <a class="btn btn-category col-md-5" href="<?=site_url($href['map'])?>">
            <img class="category-btn" src="<?=base_url('public/images/icons/plaza_merdeka_icon.png')?>">
        </a>
    </div> -->

</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
