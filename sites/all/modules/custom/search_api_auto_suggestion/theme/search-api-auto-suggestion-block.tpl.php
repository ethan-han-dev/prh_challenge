<?php

/**
 * @file
 * Search api auto suggestion block theme file.
 */
  
?>

<?php if ($variables['original_term'] != NULL): ?>
<div>
  <p><?php print t('Showing results for !link.', array('!link' => l($variables['search_term'], 'search', array('query' => array('query' => $variables['search_term'], 'is_original' => TRUE))))); ?></p>
  <p><?php print t('Search instead for !link?', array('!link' => l($variables['original_term'], 'search', array('query' => array('query' => $variables['original_term'], 'is_original' => TRUE))))); ?></p>
</div>
<?php endif; ?>
