<?php
  /**
   * Print book items that are on the same level so we can keep context
   * of pacing through a lesson of instruction.
   *
   * Variables
   * $parent - menu item that is the parent of all these child items
   * $items - an array of menu items, optionally with count and icon defined
   */
  $pre = '';
  // support for icon / count on lowest level parent
  if (isset($parent['icon'])) {
    $pre = $parent['count'] . '. ' . ' <div class="book-menu-item-' . $parent['mlid'] . ' icon-' . $parent['icon'] . '-black outline-nav-icon"></div>';
  }
?>
<li class="toolbar-menu-icon book-parent-tree-wrapper">
  <a href="#" class="book-parent-tree" data-dropdown="book-sibling-children-<?php print $parent['mlid'] ?>" aria-controls="middle-section-buttons" aria-expanded="false">
    <?php print $pre . $parent['link_title'] ?>
  </a>
</li>
<div id="book-sibling-children-<?php print $parent['mlid'] ?>" data-dropdown-content class="f-dropdown content" aria-hidden="true" tabindex="-1">
  <ul>
<?php
  foreach ($items as $item) {
    // look for active trail item
    if ($parent['link_path'] == $item['link_path']) {
      $active = ' class="book-menu-item-active"';
    }
    else {
      $active = '';
    }
    $pre = '';
    // checek for icon, we only render these at lowest level
    if (isset($item['icon'])) {
      $pre = $item['count'] . '. ' . ' <div class="book-menu-item-' . $item['mlid'] . ' icon-' . $item['icon'] . '-black outline-nav-icon"></div>';
    }
    $link = '<li' . $active . '>' . l($pre . $item['link_title'],
        $item['link_path'],
        array('html' => TRUE,
          'attributes' => array(
            'title' => $item['link_title']
          )
        )
      ) . '</li>' . "\n";
    print $link;
  }
?>
  </ul>
</div>
