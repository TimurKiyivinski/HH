<!DOCTYPE html>
<html>
<head>
    <?=$head?>
</head>
<body>
    <?=$banner?>
    <div class="container">
        <div class="col-md-12">
            <!--Title of the category-->
            <div class="curved-title">
                <div><?=$category['name']?></div>
            </div>
            <?php if ( ! isset($status)): ?>
            <!-- show message here -->
            <?php elseif ($status == FALSE): ?>
            <div class="alert-dismissible alert alert-error fade in" role="alert">
                <button aria-label="close" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?=$message?>
            </div>
            <?php elseif ($status == TRUE): ?>
            <div class="alert-dismissible alert alert-success fade in" role="alert">
                <button aria-label="close" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?=$message?>
            </div>
            <?php endif; ?>

            <?= form_open() ?>
                <input name="category_id" type="hidden" value="<?=$category['id']?>">
                <div class="form-group">
                    <label for="area">Area</label>
                    <select name="area_id" class="form-control">
                    <?php foreach($areas as $area): ?>
                    <option value="<?=$area['id']?>"><?=$area['name']?></option>
                    <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Place Name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control" required></textarea>
                </div>
                <?php foreach($category_columns as $col): ?>
                <div class="form-group">
                    <label for="<?=$col['column_name']?>"><?=humanize($col['column_name'])?></label>
                    <textarea name="<?=$col['column_name'].'_detail'?>" id="<?=$col['column_name']?>" class="form-control"></textarea>
                    <input name="<?=$col['column_name']?>" type="hidden" value="<?=$col['id']?>">
                </div>
                <?php endforeach ?>
                <button type="submit" class="btn btn-default">Submit</button>
            <?= form_close() ?>

        </div>
        <?=$navbar?>
    </div>
    <?=$js?>
</body>
</html>

