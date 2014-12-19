<img class = "icon" src="<?php echo base_url(); ?>public/images/RatingButton.png">

<a href="<?php echo "?NewRating=1"; ?>"><img src="<?php echo base_url(); ?>public/images/StarHollowButton.png" onmouseover="this.src='<?php echo base_url(); ?>public/images/StarFilledButton.png'" onmouseout="this.src='<?php echo base_url(); ?>public/images/StarHollowButton.png'"></a>
<a href="<?php echo "?NewRating=2"; ?>"><img src="<?php echo base_url(); ?>public/images/StarHollowButton.png" onmouseover="this.src='<?php echo base_url(); ?>public/images/StarFilledButton.png'" onmouseout="this.src='<?php echo base_url(); ?>public/images/StarHollowButton.png'"></a>
<a href="<?php echo "?NewRating=3"; ?>"><img src="<?php echo base_url(); ?>public/images/StarHollowButton.png" onmouseover="this.src='<?php echo base_url(); ?>public/images/StarFilledButton.png'" onmouseout="this.src='<?php echo base_url(); ?>public/images/StarHollowButton.png'"></a>
<a href="<?php echo "?NewRating=4"; ?>"><img src="<?php echo base_url(); ?>public/images/StarHollowButton.png" onmouseover="this.src='<?php echo base_url(); ?>public/images/StarFilledButton.png'" onmouseout="this.src='<?php echo base_url(); ?>public/images/StarHollowButton.png'"></a>
<a href="<?php echo "?NewRating=5"; ?>"><img src="<?php echo base_url(); ?>public/images/StarHollowButton.png" onmouseover="this.src='<?php echo base_url(); ?>public/images/StarFilledButton.png'" onmouseout="this.src='<?php echo base_url(); ?>public/images/StarHollowButton.png'"></a>

<?php
	$this->input->cookie("NewRating".$accommodation_item['id'], TRUE);
?>
