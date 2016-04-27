<section class="module portfolio full-size container-fluid">
  <div class="behance-portfolio items col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2" data-tpl="#behance-project-template" data-user="<?=get_theme_option('behance_app_user');?>" data-key="<?=get_theme_option('behance_app_key');?>"></div>
  <div class="pagination col-xs-12" id="behance-portfolio-pagination">
    <button type="button" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5 flinbu-btn lg btn-salmon portfolio-button">Load more...</button>
  </div>
  <script type="text/template" id="behance-project-template">
    <article class="col-xs-12 col-sm-6 col-md-4 project">
      <a href="{url}" title="{title}" target="_blank">
        <img src="{image}" alt="{title}" class="img-responsive center-block"/>
        <h2>{title}</h2>
        <div class="clearfix"></div>
      </a>
    </article>
  </script>
  <div class="clearfix"></div>
</section>
