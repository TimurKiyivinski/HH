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
            <?=form_open(site_url('search/by_area'), array('name' => 'search_form', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form'))?>
                <div class="input-group">
                    <input id="search" name="search" class="text form-control" value="<?=$this->input->post('search')?>" type="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-search">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </span>
                </div><!-- /.input-group -->
            </form>
        </div>
    </div><!-- /.row -->
    <?php for ($i = 1; $i < sizeof($areas); $i++): ?>
    <div class="row ">
        <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
            <a class="btn btn-category" href="<?=site_url('places/list_categories_by_area/'.$i)?>">
                <img class="category-btn" src="<?=base_url('public/images/icons/')?><?='/'.url_title($areas[$i-1]['name'], '_', TRUE).'_icon.png'?>">
            </a>
        </div>
    <?php $i++ ?>
        <div class="col-xs-6 col-md-6 col-sm-6 col-dm-6 center">
            <a class="btn btn-category" href="<?=site_url('places/list_categories_by_area/'.$i)?>">
                <img class="category-btn" src="<?=base_url('public/images/icons/')?><?='/'.url_title($areas[$i-1]['name'], '_',TRUE).'_icon.png'?>">
            </a>
        </div>
    </div><!-- /.row -->
    <?php endfor ?>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
