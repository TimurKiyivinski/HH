<!doctype html>
<html>
<head><?=$head?></head>
<body>
<?=$banner?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?=form_open(current_url(), array('method' => 'post', 'role' => 'form', 'class' => 'form-inline'))?>
            <div class="form-group">
                <input name="password" class="form-control input-lg" value="" type="password" placeholder="password">
            </div>
            <button class="btn btn-default btn-lg">Sign in</button>
            <?=form_close()?>
        </div>
    </div>
</div>
<?=$navbar?>
<?=$js?>
</body>
</html>
