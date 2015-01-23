<div class="row ">
<?php foreach ($categories as $category): ?>
    <div class="col-xs-2 col-md-2 col-sm-2 col-dm-2 center">
        <a class="btn btn-topbar" href="<?=site_url($href['places']['list'].'/'.$area_id.'/'.$category['id'])?>">
            <img class="topbar-btn" src="<?=base_url('public/images/icons/')?><?='/'.url_title($category['name'], '_', TRUE).'_icon.png'?>">
        </a>
    </div>
<?php endforeach ?>
</div><!-- /.row -->
