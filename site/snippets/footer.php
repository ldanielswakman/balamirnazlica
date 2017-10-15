  <footer id="connect">
    <div class="row">

      <div class="col-xs-12 col-sm-4 footer__left">

        <?= $site->contact_links()->kirbytext() ?>

      </div>

      <div class="col-xs-12 col-sm-8">

        <?= $site->contact_form_text()->kirbytext() ?>

        <? snippet('contact-form') ?>

      </div>
    
    </div>
  </footer>

</body>
</html>