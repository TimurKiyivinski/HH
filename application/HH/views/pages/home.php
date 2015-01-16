<html>
    <head>
        <?=$head?>
    </head>
    <body>
        <?=$navbar?>
        <table>
            <tr>
                <td>
                    <div class="title-banner">
                        <h1><?=$title?></h1>
                    </div>
                </td>
            </tr>
        </table>
        <div class="container">
            <div class="row">
                  <div class="col-xs-6 content main-content">
                    <img class="main-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg">
                  </div>
                  <div class="col-xs-4">
                        <div class="col-xs-12 content"><img class="thumb-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg"></div>
                        <div class="col-xs-12 content"><img class="thumb-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg"></div>
                  </div>
            </div><!-- Closing Row -->
        </div><!-- Closing Container -->
        <div class="content-banner">
            <h1>Ratings</h1>
        </div>
        <img class = "icon" src="<?php echo base_url('public/images/RatingButton.png'); ?>">
        <img class = "ratings" src="<?php echo base_url('public/images/StarFilledButton.png'); ?>">
        <img class = "ratings" src="<?php echo base_url('public/images/StarFilledButton.png'); ?>">
        <img class = "ratings" src="<?php echo base_url('public/images/StarFilledButton.png'); ?>">
        <img class = "ratings" src="<?php echo base_url('public/images/StarFilledButton.png'); ?>">
        <img class = "ratings" src="<?php echo base_url('public/images/StarFilledButton.png'); ?>">
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div >
            <div class="content-banner" role="tab" id="headingOne">
              <h1>
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Information
                </a>
              </h1>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <table>
                    <tr>
                        <td>
                            <img class = "icon" src="<?php echo base_url('public/images/ListButton.png'); ?>">
                        </td>
                        <td>
                            <p>
                                Find in Google Find in Google Find in Google Find in Google Find in Google Find in Google
                                Find in Google Find in Google Find in Google Find in Google Find in Google Find in Google
                                Find in Google Find in Google Find in Google Find in Google Find in Google Find in Google
                            </p>
                        </td>
                        <td>
                            <img class = "icon" src="<?php echo base_url('public/images/PlayButton.png'); ?>">
                        </td>		
                    </tr>	
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="content-banner">
            <h1>Location</h1>
        </div>
        <table>
            <tr>
                <td>
                    <img class = "icon" src="<?php echo base_url('public/images/PinButton.png'); ?>">
                </td>
                <td>
                    <p>
                        Let's Play Hide & Seek!
                    </p>
                </td>		
            </tr>	
        </table>

        <div class="content-banner">
            <h1>Opening Hour</h1>
        </div>
        <table>
            <tr>
                <td>
                    <img class = "icon" src="<?php echo base_url('public/images/ClockButton.png'); ?>">
                </td>
                <td>
                    <p>
                        11.00 am - 11.01 am, Everyday except Monday to Sunday
                    </p>
                </td>		
            </tr>	
        </table>

        <div class="content-banner">
            <h1>Contact</h1>
        </div>
        <table>
            <tr>
                <td>
                    <img class = "icon" src="<?php echo base_url('public/images/PhoneButton.png'); ?>">
                </td>
                <td>
                    <p>
                        Find in yellow book, I believe it is not exist anymore.
                    </p>
                </td>		
            </tr>	
        </table>
        <br>
        <?=$foot?>
    </body>
</html>
