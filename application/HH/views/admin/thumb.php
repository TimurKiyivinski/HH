<!DOCTYPE html>
<html>
<head>
<?=$head?>
</head>
<body>
<?=$banner?>
<div class="container">
<?php echo form_open_multipart($href['admin']['photos']['thumb']);?>
    <div class="form-group">
    <label for="userfile">Add photo:</label>
    <input type="file" name="userfile" id="userfile"/>
    <hr />
    <input id="submit" name="submit" type="submit" class="btn btn-success" value="Upload" />
    <input type="hidden" name="place_path" id="place_path" value="<?=url_title($place['name'], '_').'_thumb.png'?>"/>
    <p class="help-block">Image resolution must be 128x96</p>
    </div><!-- Name -->
</form>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
