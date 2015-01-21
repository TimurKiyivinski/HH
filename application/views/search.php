<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>

<?php
if ($results == 1)
    echo json_encode($categories['1']['name']);
else
    echo 'No results\n';
?>
<br><br><br><br>
<?=$categories['1']['places'][0]['rating']?>
<BR>
<?=$categories['1']['name']?>
<!-- Dear Sean.. xD
So $categories['x']['places'][y]['z']
Where:
x is the category id
y is the place index
z is the detail in place
-->
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
    
    <!-- start showing results -->
    <!-- TODO: implement jQuery lightweight collapse -->
    <!-- TODO: implement paging for search -->
    <div class="row">
        <div class="panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel-heading" role="tab" id="heading<?=url_title($categories['1']['name'], '_')?>">
                <a class = "white"data-toggle="collapse" data-parent="#accordion" href="#collapse<?=url_title($categories['1']['name'], '_')?>" aria-expanded="true" aria-controls="collapse<?=url_title($categories['1']['name'], '_')?>">
                    <h3 class="panel-title"><?=$categories['1']['name']?></h3>
                </a>
            </div><!-- /.panel-heading -->

            <div class="list-group panel-collapse collapse in" id="collapse<?=url_title($categories['1']['name'], '_')?>" role="tabpanel" aria-labelledby="heading<?=url_title($categories['1']['name'], '_')?>">
                <?php foreach ($categories['1']['places'] as $place): ?>
                <a class="list-group-item panel-body" href="<?=site_url($href['places']['details'].'/'.$place['category_id'].'/'.$place['id'])?>">
                    <div class="row search-panel">
                        <div class="col-xs-3 col-sm-2 col-md-2">
                            <img class="img-thumbnail place-panel-img" src="<?=base_url('public/images/places/thumbnails/Merdeka_Palace_Hotel_thumb.png')?>" alt="<?=$place['name']?>">
                        </div><!-- col-xs-3 -->
                        <div class="col-xs-9 col-sm-8 col-md-8 place-panel-detail">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 place-panel-name">
                                    <h4><?=$place['name']?></h4>
                                </div><!-- place-panel-name -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-xs-12 col-md-12 place-panel-rating">
                                    <h4>
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <?php if ($categories['1']['places'][0]['rating'] > 0): ?>
                                            <span class="glyphicon glyphicon-star"></span>
                                        <?php else: ?>
                                            <span class="glyphicon glyphicon-star-empty"></span>
                                        <?php endif; ?>
                                        <?php $categories['1']['places'][0]['rating']--; ?>
                                    <?php endfor; ?>
                                    </h4>
                                </div><!-- /.col-xs-12 -->
                            </div><!-- /.row -->
                        </div><!-- /. place-panel-detail -->
                        <div class="hidden-xs col-sm-2 col-md-2">
                            <h1><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h1>
                        </div><!-- /.hidden-xs -->
                    </div><!-- /.search-panel -->

                </a>


                <?php endforeach ?>
            </div><!-- /.list-group -->
        </div><!-- /.panel-primary -->    
    </div><!-- /.row -->
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
