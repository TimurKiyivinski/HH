<html>
    <head>
        <?=$head?>
    </head>
    <body>
        <?=$NavBar?>

        <div class="row">
            <div class="search-banner">
                <form class="form-horizontal" role="form" method="post">
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="search" placeholder="Search">
                    </div>
                    <label for="searchbox" class="col-sm-2 control-label"><img class = "left search-icon" src="<?php echo base_url(); ?>public/images/SearchButton.png"></label>
                  </div>    
                </form>
            </div>
        </div>
        <br><br><br><br>


        
        <?=$foot?>
    </body>
</html>
