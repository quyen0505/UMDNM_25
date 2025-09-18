<?php
acf_form_head();
get_header();
?>

<section class="newsletter-section">
  <div class="container">
    <div class="newsletter-wrapper">
      
      <!-- Ảnh bên trái -->
      <div class="newsletter-image">
        <img src="https://wanderland.qodeinteractive.com/wp-content/uploads/2019/10/h1-img-01.png" alt="Newsletter">
      </div>
      
      <!-- Nội dung + Form -->
      <div class="newsletter-content">
        <p class="newsletter-subtitle">Lorem ipsum dolor</p>
        
        <h2 class="newsletter-title">
          FINDING THE PERFECT TRAILS TO HIKE IS EASY WITH 
          <span class="highlight">NEWSLETTER</span>
        </h2>
        
        <p class="newsletter-desc">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore minim veniam.
        </p>

        <!-- Newsletter Form -->
        <div class="newsletter-form">
          <?php 
          acf_form(array(
              'post_id'       => 'new_post',
              'new_post'      => array(
                  'post_type'     => 'subscriber',
                  'post_status'   => 'publish'
              ),
              'post_title'    => false,
              'fields'        => array('name_12','email_12'), 
              'submit_value'  => false, // tắt nút mặc định
              'html_submit_button' => '<button type="submit" class="newsletter-submit">SUBSCRIBE </button>',
          ));
          ?>
        </div>
      </div>
    </div>
  </div>
</section>