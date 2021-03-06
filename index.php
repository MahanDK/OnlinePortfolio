<?php get_header(); ?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="intro-text">
                        <span class="name"><?php bloginfo('name'); ?></span>
                        <hr class="star-light">
                        <span class="skills"><?php bloginfo('description'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="projects">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="row">
            <!--  Post loop -->
                <?php

                $i = 1;

                if(have_posts()) : while (have_posts()) : the_post();

                 ?>

                <div class="col-sm-4 tile">
                  <a href="#projectModal<?php echo $i; ?>"
                  data-toggle="modal" class="tile-link">
                    <div class="overlay">
                      <div class="overlay-content">
                        <?php the_title(); ?>
                      </div>
                    </div>
                  <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>

                  </a>
                  <!-- caption-content here -->

                </div>

                <?php $i++; ?>

                <?php endwhile; endif; ?>

            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <!-- About page loop -->
            <?php

            $args = array(
                'page_id' => '68',
            );

            $wp_query = new WP_Query($args);

            if($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();

             ?>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php the_title(); ?></h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <?php the_content(); ?>
            </div>
            <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2>Get in Touch</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <form id="contact-form" method="post" action="wp-content/themes/OnlinePortfolio/contact.php" role="form">

              <div class="form-group">
                <label for="form_name">Name</label>
                <input type="text" class="form-control" placeholder="Name" id="name" name="name" required data-validation-required-message="Please enter your name.">
              </div>

              <div class="form-group">
                <label for="form_name">Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email address.">
              </div>

              <p class="check">Leave this field empty<input type="text" name="url"></p>

              <div class="form-group">
                <label for="form_name">Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" required data-validation-required-message="Please enter a message."></textarea>
              </div>

              <div class="row">
                <div class="form-group col-xs-12">
                    <button type="submit" class="btn btn-success btn-lg">Send</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>


    <!-- Portfolio Modals -->
    <?php

    $i = 1;

    if(have_posts()) : while (have_posts()) : the_post();

    ?>
    <div class="portfolio-modal modal fade" id="projectModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="modal-body">
                <h2><?php the_title(); ?></h2>
                <hr class="star-primary">
                <p>
                  <?php the_content(); ?>
                </p>
                <ul class="list-inline iortem-details">

                                    <li>Date:
                                        <strong><a href="http://startbootstrap.com"><?php the_time('M Y'); ?></a>
                                        </strong>
                                    </li>
                                    <li>Categories:
                                        <strong><a href="http://startbootstrap.com"><?php the_category( '' ); ?></a>
                                        </strong>
                                    </li>
                </ul>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $i++; ?>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
