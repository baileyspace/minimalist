<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="primary" class="clear">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <p><?php echo $homepageText; ?></p>
    <?php endif; ?>

    <?php if (get_theme_option('Display Featured Collection')): ?>
    <!-- Featured Collection -->
	
    <div id="featured-collection">
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>	


</div><!-- end primary -->

<div id="secondary" class="clear">
    <!-- Recent Items -->		
    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php 
        $homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '3';
        set_loop_records('items', get_recent_items($homepageRecentItems));
        if (has_loop_records('items')): 
        ?>

        <ul class="items-list">
        <?php foreach (loop('items') as $item): ?>
        <li class="item">
            <h3><?php echo link_to_item(); ?></h3>
            <?php if($itemDescription = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>150))): ?>
                <p class="item-description"><?php echo $itemDescription; ?></p>
            <?php endif; ?>						
        </li>
        <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <p><?php echo __('No recent items available.'); ?></p>
        <?php endif; ?>
        <p class="view-items-link"><?php echo link_to_items_browse(__('View All Items')); ?></p>
    </div><!-- end recent-items -->
    
</div><!-- end secondary -->
<?php echo foot(); ?>
