<form class="contact-form" action="<?= $page->url() ?>/contactform_post" method="POST">

  <input type="text" class="field" placeholder="name" name="name" value="<?= $contact_form->old('name'); ?>"><br>

  <input type="email" class="field" placeholder="email" name="email" value="<?= $contact_form->old('email'); ?>"><br>

  <input type="text" class="field" placeholder="subject" name="subject" value="<?= $contact_form->old('subject'); ?>"><br>

  <textarea class="field" placeholder="message" rows="4" name="message"><?= $contact_form->old('message'); ?></textarea>

  <?= csrf_field(); ?>

  <?= honeypot_field(); ?>

  <br><br>

  <div class="u-alignright">
    <button type="submit" class="button button--dark">Send</button>
  </div>

  <div class="contact-form__errors"></div>

</form>

