<nav class="navbar navbar-inverse navbar-fixed-bottom">
<a class="btn btn-success btn-lg btn-block" href="<?=site_url($href['admin']['view'])?>#place_<?=$place['id']?>">
    <span class="glyphicon glyphicon-open" aria-hidden="true"></span> Continue
</a>
    <div class="container">
        <div class="btn-group btn-group-justified" role="group" aria-label="navigation">
            <a class="btn" href="<?=site_url($href['search'])?>">
                <span class="details-icon flaticon-magnifying55"></span>
            </a>
            <a class="btn" href="<?=site_url()?>">
                <span class="details-icon flaticon-home151"></span>
            </a>
            <a class="btn" href="<?=site_url($href['map']['index'])?>">
                <span class="details-icon flaticon-basic6"></span>
            </a>
        </div>
    </div>
</nav>
