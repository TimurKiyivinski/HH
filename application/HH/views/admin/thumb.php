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
    <hr />
    <ul>
    <li><h4 class="help-block">Please keep images under 100kB</p></li>
    <li><h4 class="help-block">Image resolution must be 128x96</p></li>
    <li><h4 class="help-block">Images must be in jpg or png format</p></li>
    </ul>
    </div><!-- Name -->
</form>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
</body>
</html>
