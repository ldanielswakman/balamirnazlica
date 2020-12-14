<form class="contact-form" action="<?= $site->url() ?>/contactform_post" method="POST">

  <div class="contact-form__content">

    <input type="text" class="field" placeholder="name" name="name"><br>

    <input type="email" class="field" placeholder="email" name="email"><br>

    <input type="text" class="field" placeholder="subject" name="subject"><br>

    <textarea class="field" placeholder="message" rows="4" name="message"></textarea>

    <?= csrf_field(); ?>

    <?= honeypot_field(); ?>

    <br><br>

    <div class="u-alignright">
      <button type="submit" class="button button--dark">Send</button>
    </div>

    <div class="contact-form__errors"></div>

  </div>

  <div class="contact-form__progress">
    <? snippet('spinner-svg') ?>
    <small class="u-op50">Sending...</small>
  </div>

  <div class="contact-form__success">
    <? snippet('check-svg') ?>
    <small class="u-op50">Message sent</small>
    <br>
    <br>
    <strong>Thank you!</strong> 
  </div>

</form>
