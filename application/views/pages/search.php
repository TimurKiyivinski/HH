<html>
    <head>
        <?=$head?>
    </head>
    <body>
        <?=$NavBar?>

        <div class="row">
            <div class="search-banner">
                <form class="form-horizontal" role="form" method="post">
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="search" placeholder="Search">
                    </div>
                    <label for="searchbox" class="col-sm-2 control-label"><img class = "left search-icon" src="<?php echo base_url(); ?>public/images/SearchButton.png"></label>
                  </div>    
                </form>
            </div>
        </div>
        <br><br><br><br>

        <?php 
            $tables = $this->db->list_tables();

            foreach ($tables as $table)
            {
                $this->db->from($table);
                $this->db->like($table.'.name', 'merdeka', 'both'); 
                // $this->db->or_like($table'.description', 'merdeka', 'both'); sometables dont have description or website
                // $this->db->or_like($table'.website', 'merdeka', 'both');  
                $this->db->or_like($table.'.location', 'merdeka', 'both'); 

                $query = $this->db->get();
        ?>

                <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div >
                    <div class="content-banner" role="tab" id="heading<?=$table?>">
                      <h1>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$table?>" aria-expanded="true" aria-controls="collapse<?=$table?>">
                            <p class="information-link"><?=$table ?></p>
                        </a>
                      </h1>
                    </div>
                    <div id="collapse<?=$table?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?=$table?>">
                      <div class="panel-body">
                        <div class="row">
                            <?php foreach ($query->result() as $row): ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 list main-content">
                                                <div class="col-xs-2 content">
                                                    <img class="thumb-img" src="http://www.plazamerdeka.com/slideshow/slide01.jpg">
                                                </div>

                                                <div class="col-xs-9 list-description">
                                                    <h1><?=$row->name?></h1><br>
                                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                                        <?php if ($row->rating > 0): ?>
                                                            <img class = "ratings" src="<?=base_url("public/images/StarFilledButton.png")?>">
                                                        <?php else: ?>
                                                            <img class = "ratings" src="<?=base_url('public/images/StarHollowButton.png')?>">
                                                        <?php endif; ?>
                                                        <?php $row->rating--; ?>
                                                    <?php endfor; ?>
                                                    <br>
                                                    <a class="list-description" href="<?=base_url('index.php/'.$table.'/'.$row->id.'')?>">View Accommodation</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- Closing Row -->
                                </div><!-- Closing Container -->
                            <?php endforeach ?>  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        <?php
            
            }

        ?>



        
        <?=$foot?>
    </body>
</html>
