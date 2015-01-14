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
    </div>
    <!--Ratings title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Ratings
        </div>
    </div>
    <!--Ratings content-->
    <div class="details-item-rating">
        <img class="details-item-img" src="<?=base_url('public/images/icons/star_highlight.png')?>"/>
        <?php for ($i = 0; $i < 5; $i++): ?>
            <?php if ($place['rating'] > 0): ?>
                <img class="details-item-star" src="<?=base_url("public/images/icons/star_filled.png")?>">
            <?php else: ?>
                <img class="details-item-star" src="<?=base_url('public/images/icons/star_hollow.png')?>">
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
        <?=$place['description']?>
    </div>
    <!--Location title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Location
        </div>
    </div>
    <!--Location content-->
    <div class="details-item">
        <?=$place['address']?>
    </div>
    <!--Contact title-->
    <div class=" details-title bg-primary">
        <div class="bg-primary">
        Contact
        </div>
    </div>
    <!--Contact content-->
    <div class="details-item">
        <?=$place['contact']?>
    </div>
    <?=$navbar?>
    <?=$js?>
</body>
</html>
