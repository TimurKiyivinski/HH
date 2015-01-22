<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>
<!-- TODO: Add Search UI -->
<div class="container">
    <div class="panel panel-group list-group ">
        <?php foreach ($categories as $category): ?>
            <!--TODO: In the future, category_id here will be removed for details-->
            <a class="panel-body list-group-item red" href="<?=site_url('places/list_places'.'/'.$category['id'])?>">
                <div class="row search-panel">
                    <h3 class="panel-title">
                        <div class="row search-panel">
                            <div class="col-xs-3 col-sm-2 col-md-2">
                                 <img class="category-panel-img" src="<?=base_url("public/images/icons/")?><?='/'.url_title($category['name'], '_', TRUE).'_icon.png'?>" alt="">
                            </div><!-- col-xs-3 -->
                            <div class="col-xs-9 col-sm-8 col-md-8 category-panel-detail">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 category-panel-name">
                                        <h4><?=$category['name']?></h4>
                                    </div><!-- category-panel-name -->
                                </div><!-- /.row -->
                            </div><!-- /. category-panel-detail -->
                            <div class="hidden-xs col-sm-2 col-md-2">
                                <h1><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h1>
                            </div><!-- /.hidden-xs -->
                        </div>
                    </h3> 
                </div>
            </a>
        <?php endforeach?>
    </div><!-- /.list-group -->

</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
