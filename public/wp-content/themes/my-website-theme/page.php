<?php
  get_header( );
 ?>
<?php
while (have_posts()) { the_post(); ?>
 <div class="page-banner">
   <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>);"></div>
   <div class="page-banner__content container container--narrow">
     <h1 class="page-banner__title"><?php the_title() ?></h1>
     <div class="page-banner__intro">
       <p>Learn how the school of your dreams got started.</p>
     </div>
   </div>
 </div>

 <div class="container container--narrow page-section">

<?php
// We should check to see if there is a valid parent
// of this page, and also check to see whether there
// are valid children of this page.
//
// A page without any parent or children does not need
// breadcrumbs or side menu for internal navigation. The
// control block below will not apply unless either of
// the conditions are met.
$PAGE_PARENT = wp_get_post_parent_id(get_the_id());
$PAGE_HAS_CHILD = get_pages(array('child_of' => get_the_id()));
if ($PAGE_PARENT) {
 ?>
 <!-- BREADCRUMB CONTENT -->
   <div class="metabox metabox--position-up metabox--with-home-link">
     <p><a class="metabox__blog-home-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo ($PAGE_PARENT) ? get_the_title($PAGE_PARENT) : the_title() ?></a> <span class="metabox__main"><?php echo the_title() ?></span></p>
   </div>
   <!-- END BREADCRUMB -->
<?php
}
if ($PAGE_PARENT or $PAGE_HAS_CHILD) {
?>
<!-- SIDEMENU NAV -->
   <div class="page-links">
     <h2 class="page-links__title"><a href="#"><?php echo the_title() ?></a></h2>
     <ul class="min-list">
       <?php wp_list_pages(array('title_li' => NULL, 'child_of' => ($PAGE_PARENT) ? $PAGE_PARENT : get_the_id(), 'sort_column' => 'rand')); ?>
     </ul>
   </div>
   <!-- END SIDEMENU -->
<?php
}
?>
   <div class="generic-content">
     <?php the_content() ?>
   </div>

 </div>

<!-- GENERIC CONTENT 2 -->
 <!-- <div class="page-section page-section--beige">
   <div class="container container--narrow generic-content">
     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
   </div>
 </div> -->
 <!-- END GENERIC CONTENT 2 -->

<?php
}
?>
<?php
get_footer( );
 ?>
