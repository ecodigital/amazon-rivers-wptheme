<?php
/*
 * Template name: Library page
 */
?>
<?php get_header(); ?>

<article id="page">
  <?php
  $story_map = arp_get_story_map_url();
  $story_map_type = arp_get_story_map_type();
  if($story_map) : ?>
    <?php if($story_map_type == 'iframe') : ?>
      <header class="page-header">
        <div class="container">
          <div class="twelve columns">
            <section id="story-map">
              <?php echo arp_get_story_map(); ?>
            </section>
          </div>
        </div>
      </header>
    <?php elseif($story_map_type == 'youtube') : ?>
      <header class="page-header video">
        <section id="story-map" class="video">
          <?php echo arp_get_story_map(); ?>
        </section>
      </header>
    <?php endif; ?>
  <?php endif; ?>
  <?php
  query_posts('posts_per_page=3&category_name=news');
  if(have_posts()) :
    ?>
    <section id="latest" class="page-section">
      <div class="container">
        <div class="twelve columns">
          <h2 class="section-title"><?php _e('Latest news', 'arp'); ?></h2>
        </div>
      </div>
      <div class="post-list latest-list">
        <div class="container">
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <div class="four columns">
              <article class="post-item">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide-thumbnail'); ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </article>
            </div>
            <?php
          endwhile;
          ?>
        </div>
      </div>
    </section>
    <?php
  endif;
  wp_reset_query();
  ?>
  <div class="container">
    <div class="six columns">
      <?php
      query_posts('posts_per_page=3&category_name=publications');
      if(have_posts()) :
        ?>
        <section id="publications" class="page-section">
          <h2 class="section-title"><?php _e('Publications', 'arp'); ?></h2>
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <article class="post-item clearfix">
              <div class="three columns">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
              </div>
              <div class="nine columns">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
              </div>
            </article>
            <?php
          endwhile;
          ?>
        </section>
        <?php
      endif;
      wp_reset_query();
      ?>
    </div>
    <div class="two columns">
      <section id="share" class="page-section">
        <h2 class="section-title"><?php _e('Stay tuned', 'arp'); ?></h2>
        <div class="section-box">
          <?php
          $fb = get_field('site_options_facebook', 'option');
          $tw = get_field('site_options_twitter', 'option');
          $yt = get_field('site_options_youtube', 'option');
          ?>
          <?php if($fb) : ?>
            <a class="fa fa-facebook" href="<?php echo $fb; ?>" target="_blank" rel="extenal" title="Facebook"></a>
          <?php endif; ?>
          <?php if($yt) : ?>
            <a class="fa fa-youtube" href="<?php echo $yt; ?>" target="_blank" rel="external" title="YouTube"></a>
          <?php endif; ?>
          <?php if($tw) : ?>
            <a class="fa fa-twitter" href="<?php echo $tw; ?>" target="_blank" rel="external" title="Twitter"></a>
          <?php endif; ?>
        </div>
      </section>
      <section id="join" class="page-section">
        <h2 class="section-title">WWF</h2>
        <div class="section-box">
          <p><?php _e('Help stop the degradation of our planet\'s natural environment, and build a future in which people live in harmony with nature.', 'arp'); ?></p>
          <a class="button" href="#"><?php _e('Take action', 'arp'); ?></a>
        </div>
    </div>
    <div class="four columns">
      <?php
      query_posts('posts_per_page=1&category_name=videos');
      if(have_posts()) :
        ?>
        <section id="videos" class="page-section">
          <h2 class="section-title"><?php _e('Videos', 'arp'); ?></h2>
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <article class="post-item">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide-thumbnail'); ?></a>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            </article>
            <?php
          endwhile;
          ?>
        </section>
        <?php
      endif;
      wp_reset_query();
      ?>
    </div>
  </div>
</article>

<?php get_footer(); ?>
