<?php $about_me = get_about_data(); ?>
<section class="module about full-size container-fluid">
  <div class="content">
    <div class="vertical">
      <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <div class="col-xs-12 col-md-4 col-lg-3 about-photo">
          <img src="<?=$about_me->avatar;?>" alt="<?=$about_me->name . ' ' . $about_me->last_name;?>" class="img-responsive img-circle center-block" data-sr="opacity 0, move 100px, enter left, reset"/>
        </div>
        <div class="col-xs-12 col-md-8 col-lg-9">
          <div class="row">
            <div class="col-xs-12 about-bio" data-sr="opacity 0, enter top, move 100px, reset">
              <?=$about_me->bio;?>
            </div>
            <div class="col-xs-12 about-links">
              <?php if (get_theme_option('module_about_portfolio')) :?>
                <a href="<?=$about_me->cv;?>" class="flinbu-btn lg btn-salmon" data-sr="opacity 0, enter bottom, move 20px, reset">See my entire CV</a>
              <?php endif; ?>
              <?php if (get_theme_option('module_about_portfolio')) :?>
                <a href="<?=$about_me->portfolio;?>" class="flinbu-btn lg btn-bordered-salmon" data-sr="wait 0.5s, opacity 0, enter bottom, move 20px, reset">See my work</a>
              <?php endif; ?>
              <?php if (get_theme_option('module_about_contact')) :?>
                <a href="#contact" class="flinbu-btn lg btn-bordered-salmon nice-scroll" data-sr="wait 1s, opacity 0, enter bottom, move 20px, reset">Contact me</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
