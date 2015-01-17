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

    <!--Picture carousel-->
    <div class="picture-carousel">
        <div id="picture-carousel" class="carousel slide" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#picture-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#picture-carousel" data-slide-to="1"></li>
            <li data-target="#picture-carousel" data-slide-to="2"></li>
        </ol>

        <!--Wrapper for slides-->
        <!--TODO: Load images dynamically-->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="picture-carousel-img" src="<?=base_url('public/images/places/accommodation/360_Xpress_City_Centre.png')?>" alt="Xpress City Centre">
            </div>
            <div class="item">
                <img class="picture-carousel-img" src="<?=base_url('public/images/places/accommodation/Abell_Hotel.png')?>" alt="Xpress City Centre">
            </div>
            <div class="item">
                <img class="picture-carousel-img" src="<?=base_url('public/images/places/accommodation/City_Inn.png')?>" alt="Xpress City Centre">
            </div>
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

    <!--Ratings title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Ratings
        </div>
    </div>
    <!--Ratings content-->
    <div class="details-item-rating">
        <span class="glyphicon glyphicon-star icon-rating"></span>
        <?php for ($i = 0; $i < 5; $i++): ?>
            <?php if ($place['rating'] > 0): ?>
                <span class="glyphicon glyphicon-star icon"></span>
            <?php else: ?>
                <span class="glyphicon glyphicon-star-empty icon"></span>
            <?php endif; ?>
        <?php $place['rating']--; ?>
        <?php endfor; ?>
    </div>
    <!--Information title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Information
        </div>
    </div>
    <!--Information content-->
    <div class="details-item">
        <?= empty($place['description']) ? 'n/a' : $place['description'] ?>
    </div>
    <!--Food title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Cuisine
        </div>
    </div>
    <!--Food content-->
    <div class="details-item">
        Types of dishes served: <?= empty($place['type']) ? 'n/a' : $place['type'] ?><br />
        <?= empty($place['cuisine']) ? 'n/a' : $place['cuisine'] ?>
    </div>
    <!--Signature dish-->
    <div class="curved-title">
        <div>Signature Dish</div>
    </div>
    <?= empty($place['signature_dish']) ? 'n/a' : $place['signature_dish'] ?>
    <!--Open hours title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Open hours
        </div>
    </div>
    <!--Open hours content-->
    <div class="details-item">
        <?= empty($place['opening_hours']) ? 'n/a' : $place['opening_hours'] ?>
    </div>
    <!--Location title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Location
        </div>
    </div>
    <!--Location content-->
    <div class="details-item">
        <?= empty($place['address']) ? 'n/a' : $place['address'] ?>
    </div>
    <!--Contact title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Contact
        </div>
    </div>
    <!--Contact content-->
    <div class="details-item">
        Website: <?= empty($place['website']) ? 'n/a' : $place['website'] ?>
        <br />
        Phone: <?= empty($place['telephone']) ? 'n/a' : $place['telephone'] ?>
    </div>
    <?=$navbar?>
    <?=$js?>
</body>
</html>
