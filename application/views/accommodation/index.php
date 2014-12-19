<html>
    <head>
        <?=$head?>
    </head>
    <body>
        <?=$NavBar?>
        <table class="TableSettings" align="center">
            <tbody>
                <br>
                <br>
                <?php foreach ($accommodation as $accommodation_item): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 list main-content">
                                    <div class="col-xs-2 content">
                                        <img class="thumb-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg">
                                    </div>

                                    <div class="col-xs-9 list-description">
                                        <h1><?=$accommodation_item['name']?></h1><br>
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                            <?php if ($accommodation_item['rating'] > 0): ?>
                                                <img class = "ratings" src="<?=base_url("public/images/StarFilledButton.png")?>">
                                            <?php else: ?>
                                                <img class = "ratings" src="<?=base_url('public/images/StarHollowButton.png')?>">
                                            <?php endif; ?>
                                            <?php $accommodation_item['rating']--; ?>
                                        <?php endfor; ?>
                                        <br>
                                        <a class="list-description" href="<?=$accommodation_item['id']?>">View Accommodation</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Closing Row -->
                    </div><!-- Closing Container -->
                <?php endforeach ?>
            </tbody>
        </table>
    <br>
    <br>
    <?=$foot?>
    </body>
</html>
