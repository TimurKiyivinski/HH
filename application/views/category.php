<html>
<head>
<?=$head?>
</head>
<body>
<?=$navbar?>
<div class="container">
    <?php foreach ($categories as $category): ?>
    <div class="row">
        <a href="<?=site_url($href['places']['list'].'/'.$category['table_name'])?>">
            <div class="col-xs-12 list main-content">
                <div class="col-xs-9 list-description">
                    <h1><?=$category['display_name']?></h1>
                </div>
            </div>
        </a>
    </div><!-- /.row -->
    <?php endforeach ?>
</div><!-- /.container -->
<?=$foot?>
</body>
</html>

