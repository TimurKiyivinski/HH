<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>
<div class="container">

<div class="row">
    <div class="col-md-4"><a class="btn btn-primary btn-lg" href="<?=site_url($href['admin']['new'])?>">+ Add place</a></div>
</div>

<?php foreach ($places as &$place): ?>
<div class="list-group-item panel-body">
    <div class="row">
        <div class="col-xs-3 col-sm-2 col-md-2">
        <?php if(file_exists($href['thumb'].'/'.url_title($place['name'], '_').'_thumb.png')): ?>
            <img class="img-thumbnail place-panel-img" src="<?=base_url($href['thumb'].'/'.url_title($place['name'], '_').'_thumb.png')?>" alt="<?=$place['name']?>">
        <?php else: ?>
            <img class="img-thumbnail place-panel-img" src="<?=base_url($href['icon'].'/'.'noimage_icon.png')?>" alt="<?=$place['name']?>">
        <?php endif ?>
        </div><!-- col-xs-3 -->
        <div class="col-xs-9 col-sm-8 col-md-8 place-panel-detail">
            <div class="row">
                <div class="col-xs-12 col-md-12 place-panel-name">
                    <h3><?=$place['name']?></h3>
                </div><!-- place-panel-name -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-xs-12 col-md-12 place-panel-name">
                    <a class="btn btn-default" href="<?=site_url($href['admin']['edit'].'/'.$place['id'])?>">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                    </a>
                    <a class="btn btn-default" href="<?=site_url($href['admin']['photo'].'/'.$place['id'])?>">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span> Photos
                    </a>
                    <a class="btn btn-default" href="<?=site_url($href['admin']['thumb'].'/'.$place['id'])?>">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span> Thumbnail
                    </a>
                    <a class="btn btn-danger" href="<?=site_url($href['admin']['pop'].'/'.$place['id'])?>">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </a>
                </div><!-- place-panel-name -->
            </div><!-- /.row -->
        </div><!-- /. place-panel-detail -->
    </div><!-- /.place-panel -->
</div>
<?php endforeach ?>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>