<html>
<head>
<?=$head?>
</head>
<body>
<?=$navbar?>

<div class="row">
    <div class="search-banner">
        <?=form_open(current_url(), array('method' => 'get', 'class' => 'form-horizontal', 'role' => 'form'))?>
            <div class="form-group">
            <div class="col-sm-10">
                <input type="text" class="form-control" id="search" placeholder="Search" name="search">
            </div>
            <label for="searchbox" class="col-sm-2 control-label"><button type="submit" class="btn btn-default"><img class = "left search-icon" src="<?php echo base_url(); ?>public/images/SearchButton.png"></button></label>
            </div>    
        </form>
    </div>
</div>
<br><br><br><br>

<div id="accordion" role="tablist" aria-multiselectable="true">
    <div class="content-banner" role="tab" id="heading">
        <h1>
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse">
            <!-- <p class="information-link"></p> -->
            <p class="information-link"></p>
        </a>
        </h1>
    </div><!-- ./content-banner -->
    <div id="collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading">
        <div class="panel-body">
        <div class="row">
            <?php foreach ($places as $place): ?>
            <div class="container">
                <div class="row">
                    <a href="<?=site_url($href['places']['details'].'/'.$category.'/'.$place->id)?>">
                        <div class="col-xs-12 list main-content">
                            <div class="col-xs-2 content">
                                <img class="thumb-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg">
                            </div>

                            <div class="col-xs-9 list-description">
                                <h1><?=$place->name?></h1><br>
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?php if ($place->rating > 0): ?>
                                        <img class = "ratings" src="<?=base_url("public/images/StarFilledButton.png")?>">
                                    <?php else: ?>
                                        <img class = "ratings" src="<?=base_url('public/images/StarHollowButton.png')?>">
                                    <?php endif; ?>
                                    <?php $place->rating--; ?>
                                <?php endfor; ?>
                            </div><!-- /.list-description -->
                        </div><!-- /.main-content -->
                    </a>
                </div><!-- /.row -->
            </div><!-- /.container -->
            <?php endforeach ?>  
        </div>
        </div>
    </div><!-- #collapse -->
</div><!-- $accordion -->
<?=$foot?>
</body>
</html>
