<!DOCTYPE html>
<html>
<head>
    <?=$head?>
</head>
<body>
    <?=$banner?>
    <div class="container">
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
                <a class="left carousel-control red" href="#picture-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control red" href="#picture-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <hr />
        <div class="row vertical-align">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <span class="glyphicon glyphicon-star icon-rating"></span>
            </div><!-- col-xs-2 -->
            <div class="col-xs-10 col-md-10 category-panel-name">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <?php if ($place['rating'] > 0): ?>
                        <span class="glyphicon glyphicon-star icon"></span>
                    <?php else: ?>
                        <span class="glyphicon glyphicon-star-empty icon"></span>
                    <?php endif; ?>
                <?php $place['rating']--; ?>
                <?php endfor; ?>
            </div><!-- category-panel-name -->
        </div>
<<<<<<< HEAD
    </div>
    <?php endif; ?>

    <div class="panel-group list-group ">
        <div class="panel-body list-group-item-details red" >
            <h3 class="panel-title">
                <div class="row detail-panel">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                         <h1 class="flaticon-award18"></h1>
                    </div><!-- col-xs-3 -->
                    <div class="col-xs-10 col-md-10 category-panel-name">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <?php if ($place['rating'] > 0): ?>
                                <span class="glyphicon glyphicon-star icon"></span>
                            <?php else: ?>
                                <span class="glyphicon glyphicon-star-empty icon"></span>
                            <?php endif; ?>
                        <?php $place['rating']--; ?>
                        <?php endfor; ?>
                    </div><!-- category-panel-name -->
                </div>
            </h3> 
        </div>

        <div class="panel-body list-group-item-details red" >
            <h3 class="panel-title">
                <div class="row detail-panel">
                    <div class="col-xs-3 col-sm-2 col-md-2">
                         <h1 class="flaticon-info6"></h1>
                    </div><!-- col-xs-3 -->
                    <div class="col-xs-9 col-md-9 category-panel-name seemoreless">
                        <?= empty($place['description']) ? 'n/a' : $place['description'] ?>
                    </div><!-- category-panel-name -->
=======
        <?php if ( ! empty($place['description'])): ?>
        <hr />
        <div class="row vertical-align">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <span class="details-icon flaticon-info2"></span>
            </div><!-- col-xs-2 -->
            <div class="col-xs-10 col-md-10 category-panel-name seemoreless">
                <div id="filler">
                    <?=character_limiter($place['description'], 100);?>
                    <p>
                        <a data-toggle="collapse" href="#description" aria-expanded="false" aria-controls="description">
                            See more
                        </a>
                    </p>
                </div>
                <div class="collapse" id="description">
                    <p><?=$place['description']?></p>
>>>>>>> origin/developing
                </div>
            </div><!-- category-panel-name -->
        </div>
        <?php endif ?>
        <?php if ( ! empty($place['room_rate'])): ?>
        <hr />
        <div class="row vertical-align">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <span class="details-icon flaticon-dollar179"></span>
            </div><!-- col-xs-2 -->
            <div class="col-xs-10 col-md-10 category-panel-name">
                <?=empty($place['room_rate']) ? 'n/a' : $place['room_rate'] ?>
            </div><!-- category-panel-name -->
        </div>
        <?php endif ?>
        <?php if ( ! empty($place['address'])): ?>
        <hr />
        <a href="<?=site_url($href['map']['go'].'/'.$place['latitude'].'/'.$place['longitude'])?>">
        <div class="row vertical-align">
            <div class="col-xs-2 col-sm-2 col-md-2">
                    <span class="details-icon flaticon-map49"></span>
            </div><!-- col-xs-2 -->
            <div class="col-xs-10 col-md-10 category-panel-name">
                <?=$place['address']?>
            </div><!-- category-panel-name -->
        </div>
        </a>
        <?php endif ?>
        <?php if ( ! empty($place['latitude']) && ! empty($place['longitude'])): ?>
        <hr />
        <a href="<?=site_url($href['map']['go'].'/'.$place['latitude'].'/'.$place['longitude'])?>">
        <div class="row vertical-align">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <span class="details-icon flaticon-compass109"></span>
            </div><!-- col-xs-2 -->
            <div class="col-xs-10 col-md-10 category-panel-name">
                Navigate Here
            </div><!-- category-panel-name -->
        </div>
        </a>
        <?php endif ?>
        <?php if ( ! empty($place['telephone'])): ?>
        <hr />
        <a href="tel:<?=$place['telephone']?>">
        <div class="row vertical-align">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <span class="details-icon flaticon-auricular6"></span>
            </div><!-- col-xs-2 -->
            <div class="col-xs-10 col-md-10 category-panel-name">
                <?=$place['telephone']?>
            </div><!-- category-panel-name -->
        </div>
        </a>
        <?php endif ?>
        <?php if ( ! empty($place['website']) ): ?>
        <hr />
        <a href="<?=$place['website']?>">
        <div class="row vertical-align">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <span class="details-icon flaticon-internet5"></span>
            </div><!-- col-xs-2 -->
            <div class="col-xs-10 col-md-10 category-panel-name">
            <?= $place['website']?>
            </div><!-- category-panel-name -->
        </div>
        </a>
        <?php endif ?>
        <?php if ( ! $this->input->cookie('hh_place_'.$place['id'])): ?>
        <!-- ratable -->
        <hr />
        <div class="row vertical-align">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <span class="details-icon"></span>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div id="ratable">
                <?=form_open()?>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <a href="#" data-rate="<?=$i?>"><span class="glyphicon glyphicon-star-empty ratable"></span></a>
                <?php endfor ?>
                <input value="<?=current_url()?>" type="hidden" name="rate_url">
                <input value="<?=$place['id']?>" type="hidden" name="place_id">
                <?=form_close()?>
                </div>
            </div>
        </div>
        <?php endif ?>
    </div><!-- /.container -->
    <?=$navbar?>
    <?=$js?>
<<<<<<< HEAD

    <!-- test -->

    <?=word_limiter($place['description'], 20);?>
    <br>
    <?= substr(word_limiter($place['description'], 20) ,0,-7);?>
    <?=$place['description'];?>

    <script>
    $(document).ready(function()
    {   
        <?php $hidetext = 20; ?>

        var hidetext = <?=$hidetext?>;

        if (<?=strlen($place['description'])?> > hidetext) 
            {      
                // Append the parsed HTML
                $( ".seemoreless" ).text("")
                $( ".seemoreless" ).append( $.parseHTML("<?=word_limiter($place['description'], 20);?>" ) );

                $( ".seemoreless" ).append( $.parseHTML("<a data-toggle='collapse' href='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>(Click For More Info)</a><div class='collapse' id='collapseExample'>REPLACE WITH DESCRIPTION</div>"));

            };
        
    });
    </script>

    <!-- test -->
=======
    <script src="<?=base_url('public/js/details.js')?>"></script>
   
>>>>>>> origin/developing
</body>
</html>
