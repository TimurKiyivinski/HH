<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>
<div class="container">
<?php foreach ($photos as &$photo): ?>
<div class="list-group-item panel-body">
    <div class="col-xs-12 col-md-12 place-panel-name">
    <div class="row">
    <a href="<?=base_url($photo['photo_link'])?>">Photo: <?= $photo['photo_link']?></a>
    </div>
    <div class="row">
    <a href="<?=site_url($href['admin']['photos']['pop'].'/'.$place_id.'/'.$photo['id'])?>">Delete</a>
    </div>
    </div><!-- place-panel-name -->
</div>
<?php endforeach ?>
<hr />
<?php echo form_open_multipart('admin/place/upload_photo');?>
    <div class="form-group">
    <label for="userfile">Add photo:</label>
    <input type="file" name="userfile" id="userfile"/>
    <hr />
    <input id="submit" name="submit" type="submit" class="btn btn-success" value="Upload" />
    <input type="hidden" name="place_id" id="place_id" value="<?=$place_id?>"/>
    <input type="hidden" name="category_name" id="category_name" value="<?=$category_name?>"/>
    <p class="help-block">Please keep images under 500kB</p>
    </div><!-- Name -->
</form>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
