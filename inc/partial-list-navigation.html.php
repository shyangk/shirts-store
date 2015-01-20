<?php

/* This file displays a list of links to pages of shirts. It needs to
 * receive the total number of pages ($total_pages) and the current
 * page number ($current_page). It will display all the numbers between
 * 1 and $total_pages, and it will make all but $current_page a link.
 */
if ($current_page != 1){
	$prev_page = $current_page - 1;
} else {
	$prev_page = $current_page;
}

if ($current_page != $total_pages){
	$next_page = $current_page + 1;
} else {
	$next_page = $current_page;
}

?>
	<ul class="pagination">
		<li class="<?php if($prev_page == $current_page){echo "disabled";} ?>">
	      <a href="./?pg=<?php echo $prev_page; ?>" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	      </a>
	    </li>
		<?php $i = 0; ?>
		<?php while ($i < $total_pages) : ?>
			<?php $i += 1; ?>
			<?php if ($i == $current_page) : ?>
				<li class="active"><span><?php echo $i; ?></span>
			<?php else : ?>
				<li><a href="./?pg=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php endif; ?>
			</li>
		<?php endwhile; ?>
		<li class="<?php if($next_page == $current_page){echo "disabled";}?>">
	      <a href="./?pg=<?php echo $next_page; ?>" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	      </a>
		</li>
	</ul>