<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>
<div class="container">
    <div class="row">
        <div class="list-group">
        <?php foreach ($categories as $category): ?>
            <a class="list-group-item" href="<?=site_url($href['places']['list'].'/'.$category['id'])?>">
                <!-- TODO: Add category icons -->
                <?=$category['display_name']?>
                <!-- TODO: Add chevron icon -->
            </a>
        <?php endforeach ?>
        </div><!-- /.list-group -->
    </div><!-- /.row -->
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>

