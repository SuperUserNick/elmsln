<?php
/**
 * @file
 * Default theme implementation to display a region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
  if (!isset($cis_lmsless['active'])) {
    $cis_lmsless['active']['title'] = '';
  }
?>
    <div id="etb-tool-nav" class="off-canvas-wrap" data-offcanvas>
      <div class="inner-wrap">
        <!-- progress bar -->
        <div class="page-scroll progress">
          <span class="meter" style="width: 0%"></span>
        </div>

        <?php print render($page['cis_appbar_first']); ?>
        <?php print render($page['left_menu']); ?>

        <section class="main-section etb-book">
          <div class="region-header row">
            <div class="region-header__left">
              <?php print render($page['header']); ?>
            </div>
            <div class="region-header__right">
              <ul class="region-header__edit-icons">
                <li class="region-header__edit-icons__list-item">
                  <a href="#" class="region-header__icon" data-dropdown="region-header__icon--edit" aria-controls="region-header__icon--edit" aria-expanded="false">
                    <div class="icon-edit-black off-canvas-toolbar-item-icon"></div>
                  </a>
                </li>
              </ul>
              <!-- Middle Section Dropdown Page Tabs -->
              <?php if (!empty($tabs['#primary']) || !empty($tabs['#secondary']) || !empty($tabs_extras)): ?>
              <div id="region-header__icon--edit" data-dropdown-content class="f-dropdown content" aria-hidden="true" tabindex="-1">
                <?php if (!empty($tabs)): ?>
                    <?php print render($tabs); ?>
                  <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
                <?php endif; ?>
                <?php if ($action_links): ?>
                    <?php print render($action_links); ?>
                <?php endif; ?>
                <?php if (isset($tabs_extras)): ksort($tabs_extras); ?>
                 <?php foreach ($tabs_extras as $group) : ?>
                  <?php foreach ($group as $button) : ?>
                    <li><?php print $button; ?></li>
                  <?php endforeach; ?>
                 <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="row">
            <div class="content-element-region small-12 medium-12 large-12 columns">
              <div class="row">
                <div class="small-12 medium-12 large-push-1 large-10 columns" role="content">
                  <?php if (!empty($page['highlighted'])): ?>
                    <div class="highlight panel callout">
                      <?php print render($page['highlighted']); ?>
                    </div>
                  <?php endif; ?>

                  <?php if (!empty($messages)): ?>
                    <div class="region-messeges row">
                      <?php print $messages; ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($breadcrumb) : ?>
                    <div class="breadcrumb-wrapper">
                    <?php print $breadcrumb; ?>
                    </div>
                  <?php endif; ?>

                  <?php if (!empty($page['help'])): ?>
                    <div class="region-help row">
                      <?php print render($page['help']); ?>
                    </div>
                  <?php endif; ?>

                  <a id="main-content"></a>
                  <?php if ($title): ?>
                    <?php print render($title_prefix); ?>
                      <h1 id="page-title" class="title"><?php print $title; ?></h1>
                    <?php print render($title_suffix); ?>
                  <?php endif; ?>
                  <?php print render($page['content']); ?>
                </div>
              </div>
            </div>
          </div>
        </section>

      <a class="exit-off-canvas"></a>
      </div>
    </div>
    <footer class="sticky-footer">
      <div class="row">
        <div class="small-12 medium-push-1 medium-10 columns">
          <?php if (!empty($page['footer'])): ?>
          <?php print render($page['footer']); ?>
          <?php endif; ?>
        </div>
        <?php if (!empty($page['footer_firstcolumn']) || !empty($page['footer_secondcolumn'])): ?>
        <hr/>
        <div class="row">
          <?php if (!empty($page['footer_firstcolumn'])): ?>
          <div class="large-6 columns">
            <?php print render($page['footer_firstcolumn']); ?>
          </div>
          <?php endif; ?>
          <?php if (!empty($page['footer_secondcolumn'])): ?>
          <div class="large-6 columns">
            <?php print render($page['footer_secondcolumn']); ?>
          </div>
          <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    </footer>
<!-- generic container for other off canvas modals -->
<?php print render($page['cis_appbar_modal']); ?>
