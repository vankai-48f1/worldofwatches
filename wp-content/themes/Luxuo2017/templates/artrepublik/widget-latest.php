<div class='widget popular-posts popular-posts--artrepublik'>
  <div class='popular-posts__header'>
    <h2><a href='/artrepublik'>ArtRepublik</a></h2>
  </div>

  <ul>
    <?php
    $args = array(
      'posts_per_page' => 5,
      'tag' => 'art-republik');
    $posts = get_posts($args);
    foreach ($posts as $post): setup_postdata($post);
      $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')[0];
    ?>

    <li>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <a href="<?php the_permalink(); ?>"><img src="<?= $post_thumb; ?>" sizes="(max-width: 600px) 100vw, 600px"></a>
    </li>

    <?php
    endforeach;
    wp_reset_postdata();
    ?>
  </ul>
</div>

