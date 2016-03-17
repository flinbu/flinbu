<?php
  $social = get_social_networks();
  if ($social) :
?>
  <ul class="social">
    <?php $i = 0; foreach ($social as $net) : ?>
      <li class="<?=$net['class'];?>">
        <a href="<?=$net['url'];?>" target="_blank" title="Follow me on <?=$net['name'];?>" data-sr="opacity: wait <?=3 + ($i/5);?>s, 0, enter top, move 30px, spin -90deg, reset"><i class="fa <?=$net['icon'];?>"></i></a>
      </li>
    <?php $i++; endforeach; ?>
  </ul>
<?php endif; ?>
