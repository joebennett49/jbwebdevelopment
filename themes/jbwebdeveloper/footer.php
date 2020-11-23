<!-- end websiteContent and overlay-->
</div>


<footer class="">
  <div class="row">
    <div class="flex">
      <div style="color:#fff;" class="flex-item">
        <p class="title">Let's create something</br>amazing!</p>
        <p>If you've made it down this far why not get in touch to see how I can help you.</p>
        <div class="flex topAlign">
          <div class="flex-item">
            <?php echo do_shortcode('[contact-form-7 id="635" title="Contact form 1"]'); ?>
          </div>
        </div>
      </div>
      <div class="flex-item fifty">

        <noscript>
          <img id="imageContact" class="" src="<?php echo get_template_directory_uri(); ?>/assets/img/contact.svg" alt="contact me"/>
        </noscript>

        <img id="imageContact" class="" data-src="<?php echo get_template_directory_uri(); ?>/assets/img/contact.svg" alt="contact me" />

        <div class="contact-details">
          <h2>Contact Details</h2>
          <div class="email"><span>Email:</span> <a href="mailto:joe@jbwebdeveloper.co.uk">joe@jbwebdeveloper.co.uk</a></div>
          <div class="tel"><span>Phone:</span> <a href="tel:07932311685">07932311685</a></div>
        </div>
      </div>
      <!-- <div class="flex-item rightAlign">
        <a href="tel:07932311685">07932311685</a>
        <a href="mailto:joe@jbwebdeveloper.co.uk">joe@jbwebdeveloper.co.uk</a>
      </div> -->
    </div>
  </div>

</footer>


<?php wp_footer(); ?>

</body>

</html>
