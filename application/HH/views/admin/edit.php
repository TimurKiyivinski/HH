<!DOCTYPE html>
<html>
<head>
<?=$head?>
<script type="text/javascript" >
function changeDIV(selectObj) {
    // Get selected value
    selectVal = selectObj.options[selectObj.selectedIndex].value;
    // Get number of categories
    selectLen = selectObj.options.length;
    // Loop and hide all divs
    detailDIVs = document.getElementsByClassName('category_detail');
    for ( i = 0 ; i < detailDIVs.length; i++)
        detailDIVs[i].style.display = 'none';
    // Set the selected div to visible
    detailShow = document.getElementsByClassName('category_detail_' + selectVal);
    for ( i = 0 ; i < detailShow.length; i++)
        detailShow[i].style.display = '';
}
window.onload = changeDIV(document.getElementById('place_category_id'));
</script>
</head>
<body>
<?=$banner?>
<div class="container">
<?=form_open(current_url(), array('name' => 'new_form', 'method' => 'post', 'role' => 'form'))?>
    <div class="form-group">
    <label for="place_name">Name:</label>
    <input class="form-control" type="text" name="place_name" id="place_name" value="<?=$place['name']?>"/>
    </div><!-- Name -->
    <div class="form-group">
    <label for="place_address">Address:</label>
    <input class="form-control" type="text" name="place_address" id="place_address" value="<?=$place['address']?>"/>
    </div><!-- Address -->
    <div class="form-group">
    <label for="place_description">Description:</label>
    <textarea class="form-control" name="place_description" id="place_description"><?=$place['description']?></textarea>
    </div><!-- Description -->
    <div class="form-group">
    <label for="place_latitude">Latitude:</label>
    <input class="form-control" type="number" name="place_latitude" id="place_latitude" value="<?=$place['latitude']?>"/>
    </div><!-- Latitude -->
    <div class="form-group">
    <label for="place_longitude">Longitude:</label>
    <input class="form-control" type="number" name="place_longitude" id="place_longitude" value="<?=$place['longitude']?>"/>
    </div><!-- Longitude -->
    <div class="form-group">
    <label for="place_area_id">Area:</label>
    <select class="form-control" name="place_area_id" id="place_area_id"/>
        <?php foreach ($areas as &$area): ?>
        <option <?php if ($area['id'] == $place['area_id']): ?>selected="selected"<?php endif?> value="<?=$area['id']?>"><?=$area['name']?></option>
        <?php endforeach ?>
    </select>
    </div><!-- Area -->
    <div class="form-group">
    <label for="place_category_id">Category:</label>
    <select class="form-control" name="place_category_id" id="place_category_id" onchange="changeDIV(this)"/>
        <?php foreach ($categories as &$category): ?>
        <option <?php if ($category['id'] == $place['category_id']): ?>selected="selected"<?php endif?> id="category_<?=$category['id']?>" value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endforeach ?>
    </select>
    </div><!-- Category -->
    <!-- Category specific details -->
    <div class="form-group">
    <h4>Category specific details:</h4>
    <?php foreach ($categories as &$category): ?>
    <?php foreach ($columns as &$column): ?>
    <?php if ($category['id'] == $column['category_id']): ?>
    <div class="form-group category_detail category_detail_<?=$category['id']?>">
    <label for="column_<?=$column['id']?>"><?=$column['column_name']?>:</label>
    <input class="form-control" type="text" name="column_<?=$column['id']?>" id="column_<?=$column['id']?>" value="<?php if (isset($place[$column['column_name']])) { echo $place[$column['column_name']]; }?>"/>
    </div><!-- Name -->
    <?php endif ?>
    <?php endforeach ?>
    <?php endforeach ?>
    </div>
    <div class="form-group">
        <input id="submit" name="submit" type="submit" class="btn btn-success" value="Save"></input>
        <button type="button" class="btn btn-warning" onclick="window.location = '<?=site_url($href['admin']['view'])?>'" >Cancel</button>
    </div>
</form>
</div><!-- /.container -->
<?=$navbar?>
<?=$js?>
<script type="text/javascript" >
window.onload = changeDIV(document.getElementById('place_category_id'));
</script>
</body>
</html>
