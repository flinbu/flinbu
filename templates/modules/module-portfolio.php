<section class="module portfolio full-size-min container-fluid">
  <div class="module-title col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <h2>Portfolio</h2>
    <small>Powered by <a href="http://behance.net" target="_blank">Behance</a></small>
  </div>
  <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <div class="behance-portfolio items row" data-tpl="#behance-project-template" data-user="<?=get_theme_option('behance_app_user');?>" data-key="<?=get_theme_option('behance_app_key');?>"></div>
  </div>
  <a href="#" class="behance-nav-prev behance-nav"><i class="fa fa-arrow-left"></i></a>
  <a href="#" class="behance-nav-next behance-nav"><i class="fa fa-arrow-right"></i></a>
  <script type="text/template" id="behance-project-template">
    <article class="col-xs-12 col-sm-6 col-md-4 project">
      <figure class="effect-apollo">
        <img src="{image}" alt="{title}" />
        <figcaption>
          <h2>{title}</h2>
          <ul class="tags">{tags}</ul>
          <a href="{url}" target="_blank" title="{title}">View more</a>
        </figcaption>
      </figure>
    </article>
  </script>
  <!-- <script type="text/template" id="behance-project-template">
    <article class="col-xs-12 col-sm-6 col-md-4 project">
      <a href="{url}" title="{title}" target="_blank">
        <img src="{image}" alt="{title}" class="img-responsive center-block"/>
        <h2>{title}</h2>
        <ul class="tags">{tags}</ul>
        <div class="clearfix"></div>
      </a>
    </article>
  </script> -->
  <div class="clearfix"></div>
</section>
