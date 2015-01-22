<!-- TODO: refactor details page -->
<!DOCTYPE html>
<html>
<head>
    <?=$head?>
</head>
<body>
    <?=$banner?>
    <!--Title of the place-->
    <div class="curved-title">
        <div><?=$place['name']?></div>
    </div>

    <!--Pictures loader-->
    <?php if (sizeof($place['photos']) == 0): ?>
        <div class="row search-bar bg-primary">
            <div class="col-xs-12 col-sm-12 col-dm-12">
                No Pictures Avalaible.
            </div>
        </div>
    <?php else: ?>
            <!--Picture carousel-->
            <div class="picture-carousel">
                <div id="picture-carousel" class="carousel slide" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < sizeof($place['photos']); $i++): ?>
                        <?php if ($i == 0): ?>
                            <li data-target="#picture-carousel" data-slide-to="<?=$i?>" class="active"></li>
                        <?php else: ?>
                            <li data-target="#picture-carousel" data-slide-to="<?=$i?>"></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                </ol>
                
                <!--Wrapper for slides-->
                <div class="carousel-inner" role="listbox"> 
                    <?php for ($i = 0; $i < sizeof($place['photos']); $i++): ?>
                        <?php if ($i == 0): ?>
                            <div class="item active">
                                <img class="picture-carousel-img" src="<?=base_url($place['photos'][$i]['photo_link'])?>" alt="Unable to locate image.">
                            </div>
                        <?php else: ?>
                            <div class="item">
                                <img class="picture-carousel-img" src="<?=base_url($place['photos'][$i]['photo_link'])?>" alt="Unable to locate image.">
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#picture-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#picture-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                </div>
    <?php endif; ?>

    <div class="panel-group list-group ">
        <div class="panel-body list-group-item-details red" >
            <h3 class="panel-title">
                <div class="row detail-panel">
                    <div class="col-xs-3 col-sm-2 col-md-2">
                         <span class="glyphicon glyphicon-star icon-rating"></span>
                    </div><!-- col-xs-3 -->
                    <div class="col-xs-9 col-sm-8 col-md-8 category-panel-detail">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 category-panel-name">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?php if ($place['rating'] > 0): ?>
                                        <span class="glyphicon glyphicon-star icon"></span>
                                    <?php else: ?>
                                        <span class="glyphicon glyphicon-star-empty icon"></span>
                                    <?php endif; ?>
                                <?php $place['rating']--; ?>
                                <?php endfor; ?>
                            </div><!-- category-panel-name -->
                        </div><!-- /.row -->
                    </div><!-- /. category-panel-detail -->
                </div>
            </h3> 
        </div>

        <div class="panel-body list-group-item-details red" >
            <h3 class="panel-title">
                <div class="row detail-panel">
                    <div class="col-xs-3 col-sm-2 col-md-2">
                         <h1 class="flaticon-info2"></h1>
                    </div><!-- col-xs-3 -->
                    <div class="col-xs-9 col-sm-8 col-md-8 category-panel-detail">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 category-panel-name">
                                 <?=$place['description']?>
                            </div><!-- category-panel-name -->
                        </div><!-- /.row -->
                    </div><!-- /. category-panel-detail -->
                </div>
            </h3> 
        </div>

        <div class="panel-body list-group-item-details red" >
            <h3 class="panel-title">
                <div class="row detail-panel">
                    <div class="col-xs-3 col-sm-2 col-md-2">
                         <h1 class="flaticon-clock97"></h1>
                    </div><!-- col-xs-3 -->
                    <div class="col-xs-9 col-sm-8 col-md-8 category-panel-detail">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 category-panel-name">
                                 <?=$place['opening_hours']?>
                            </div><!-- category-panel-name -->
                        </div><!-- /.row -->
                    </div><!-- /. category-panel-detail -->
                </div>
            </h3> 
        </div>

        <div class="panel-body list-group-item-details red" >
            <h3 class="panel-title">
                <div class="row detail-panel">
                    <div class="col-xs-3 col-sm-2 col-md-2">
                         <h1 class="flaticon-map49"></h1>
                    </div><!-- col-xs-3 -->
                    <div class="col-xs-9 col-sm-8 col-md-8 category-panel-detail">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 category-panel-name">
                                <h3><a href="<?=site_url('map/index/'.$place['area_id'].'/'.$place['latitude'].'/'.$place['longitude'])?>"><?=$place['address']?></a></h3>

                            </div><!-- category-panel-name -->
                        </div><!-- /.row -->
                    </div><!-- /. category-panel-detail -->
                </div>
            </h3> 
        </div>

        <div class="panel-body list-group-item-details red" >
            <h3 class="panel-title">
                <div class="row detail-panel">
                    <div class="col-xs-3 col-sm-2 col-md-2">
                         <h1 class="flaticon-auricular6"></h1>
                    </div><!-- col-xs-3 -->
                    <div class="col-xs-9 col-sm-8 col-md-8 category-panel-detail">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 category-panel-name">
                                <?=$place['telephone']?>
                            </div><!-- category-panel-name -->
                        </div><!-- /.row -->
                    </div><!-- /. category-panel-detail -->
                </div>
            </h3> 
        </div>

        <div class="panel-body list-group-item-details red" >
            <h3 class="panel-title">
                <div class="row detail-panel">
                    <div class="col-xs-3 col-sm-2 col-md-2">
                         <h1 class="flaticon-internet5"></h1>
                    </div><!-- col-xs-3 -->
                    <div class="col-xs-9 col-sm-8 col-md-8 category-panel-detail">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 category-panel-name">
                                <?=$place['website']?>
                            </div><!-- category-panel-name -->
                        </div><!-- /.row -->
                    </div><!-- /. category-panel-detail -->
                </div>
            </h3> 
        </div>
    </div><!-- /.list-group -->
    <?=$navbar?>
    <?=$js?>
</body>
</html>
