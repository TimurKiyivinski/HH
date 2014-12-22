<html>
    <head>
        <?=$head?>
    </head>
    <body>
        <?=$NavBar?>

        <div class="title-banner">
            <h1><?=$title?></h1>
        </div>
        <br><br><br><br>

        <div class="container">
            <div class="row">
                  <div class="col-xs-6 content main-content">
                    <img class="main-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg">
                  </div>
                  <div class="col-md-4">
                        <div class="col-xs-12 content"><img class="thumb-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg"></div>
                        <div class="col-xs-12 content"><img class="thumb-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg"></div>
                  </div>
            </div><!-- Closing Row -->
        </div><!-- Closing Container -->

        <div class="content-banner">
            <h1>Ratings</h1>
        </div>
        <img class = "icon" src="<?=base_url('public/images/RatingButton.png')?>">
        <?=$DisplayRatingSystem?>
        
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div >
            <div class="content-banner" role="tab" id="headingOne">
              <h1>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <p class="information-link">Information</p>
                </a>
              </h1>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <div class="row">
                    <div class="col-xs-2"><img class = "icon" src="<?=base_url('public/images/ListButton.png')?>"></div>

                    <div class="col-xs-4">
                        <table class="information-content ">
                            <tr>
                                <td><p class="text-right">Name:</p></td>
                                <td class="information-content "><p><?=$name?></p></td>
                            </tr>
                            <tr>
                                <td><p class="text-right">Website:</p></td>
                                <td class="information-content "><p><?=$website?></p></td>
                            </tr>
                            <tr>
                                <td><p class="text-right">Location:</p></td>
                                <td class="information-content "><p><?=$location?></p></td>
                            </tr>
                            <tr>
                                <td><p class="text-right">Description:</p></td>
                                <td class="information-content "><p><?=$description?></p></td>
                            </tr>
                            <tr>
                                <td><p class="text-right">Longitude:</p></td>
                                <td class="information-content "><p><?=$longitude?></p></td>
                            </tr>
                            <tr>
                                <td><p class="text-right">Latitude:</p></td>
                                <td class="information-content "><p><?=$latitude?></p></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-2"><img class = "icon" src="<?=base_url('public/images/PlayButton.png')?>"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="content-banner">
            <h1>Location</h1>
        </div>
        <div class="row">
            <div class="col-xs-2"><img class = "icon" src="<?=base_url('public/images/PinButton.png')?>"></div>
            <div class="col-md-4"><?php echo "<p>".$location. "</p>"; ?></div>
        </div>

        <div class="content-banner">
            <h1>Opening Hour</h1>
        </div>
        <div class="row">
            <div class="col-xs-2"><img class = "icon" src="<?=base_url('public/images/ClockButton.png')?>"></div>
            <div class="col-md-4"><p>11.00 am - 11.01 am, Everyday except Monday to Sunday</p></div>
        </div>

        <div class="content-banner">
            <h1>Contact</h1>
        </div>
        <div class="row">
            <div class="col-xs-2"><img class = "icon" src="<?=base_url('public/images/PhoneButton.png')?>"></div>
            <div class="col-md-4"><p>Find in yellow book, I believe it is not exist anymore.</p></div>
        </div>

        <div class="content-banner">
            <h1>Rate Us Please</h1>
        </div>
        <?=$RatingSystem?>
        <?=$foot?>
    </body>
</html>
