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
        <div class="panel panel-category" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel-heading border" role="tab" id="heading<?=url_title($category['name'], '_')?>">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=url_title($category['name'], '_')?>" aria-expanded="true" aria-controls="collapse<?=$category['name']?>">
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
                </a>
            </div><!-- /.panel-heading -->

            <!-- List of places here (foreach goes here for places in the category) -->
            <div class="list-group panel-collapse collapse in" id="collapse<?=url_title($category['name'], '_')?>" role="tabpanel" aria-labelledby="heading<?=$category['name']?>">
                <?php foreach ($category['places'] as $place): ?>
                    <!--TODO: In the future, category_id here will be removed for details-->
                    <a class="list-group-item panel-body" href="<?=site_url($href['places']['details'].'/'.$category['id'].'/'.$place['id'])?>">
                        <div class="row search-panel">
                            <div class="col-xs-3 col-sm-2 col-md-2">
                                <img class="img-thumbnail place-panel-img" src="<?=base_url($place['thumbnail'])?>" alt="">
                            </div><!-- col-xs-3 -->
                            <div class="col-xs-9 col-sm-8 col-md-8 category-panel-detail">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 category-panel-name">
                                    <h4><?=$place['name']?></h4>
                                    </div><!-- category-panel-name -->
                                </div><!-- /.row -->
                            </div><!-- /. category-panel-detail -->
                            <div class="hidden-xs col-sm-2 col-md-2">
                                <h1><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h1>
                            </div><!-- /.hidden-xs -->
                        </div><!-- /.search-panel -->  
                    </a>
                <?php endforeach?>
            </div><!-- /.list-group -->
        </div><!-- /.panel-category -->   
    <?php endforeach?>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
