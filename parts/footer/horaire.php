<table class="table-horaire">
  <tr class="item-heure">
    <td class="day">Lundi</td>
    <?php if(checked(1, get_option('lundi_fermer'), false)) { ?>
      <td class="close"><span>Fermé</span></td>
    <?php } else { ?>
      <td class="heure">
        <span><?php echo get_option('lundi_mide_de'); ?></span> -
        <span><?php echo get_option('lundi_mide_a'); ?></span><br />
        <span><?php echo get_option('lundi_soir_de'); ?></span> -
        <span><?php echo get_option('lundi_soir_a'); ?></span>
      </td>
    <?php } ?>
  </tr>

  <tr class="item-heure">
    <td class="day">Mardi</td>
    <?php if(checked(1, get_option('mardi_fermer'), false)) { ?>
      <td class="close"><span>Fermé</span></td>
    <?php } else { ?>
      <td class="heure">
        <span><?php echo get_option('mardi_mide_de'); ?></span> -
        <span><?php echo get_option('mardi_mide_a'); ?></span><br />
        <span><?php echo get_option('mardi_soir_de'); ?></span> -
        <span><?php echo get_option('mardi_soir_a'); ?></span>
      </td>
    <?php } ?>
  </tr>

  <tr class="item-heure">
    <td class="day">Mercredi</td>
    <?php if(checked(1, get_option('mercredi_fermer'), false)) { ?>
      <td class="close"><span>Fermé</span></td>
    <?php } else { ?>
      <td class="heure">
        <span><?php echo get_option('mercredi_mide_de'); ?></span> -
        <span><?php echo get_option('mercredi_mide_a'); ?></span><br />
        <span><?php echo get_option('mercredi_soir_de'); ?></span> -
        <span><?php echo get_option('mercredi_soir_a'); ?></span>
      </td>
    <?php } ?>
  </tr>

  <tr class="item-heure">
    <td class="day">Jeudi</td>
    <?php if(checked(1, get_option('jeudi_fermer'), false)) { ?>
      <td class="close"><span>Fermé</span></td>
    <?php } else { ?>
      <td class="heure">
        <span><?php echo get_option('jeudi_mide_de'); ?></span> -
        <span><?php echo get_option('jeudi_mide_a'); ?></span><br />
        <span><?php echo get_option('jeudi_soir_de'); ?></span> -
        <span><?php echo get_option('jeudi_soir_a'); ?></span>
      </td>
    <?php } ?>
  </tr>

  <tr class="item-heure">
    <td class="day">Vendredi</td>
    <?php if(checked(1, get_option('vendredi_fermer'), false)) { ?>
      <td class="close"><span>Fermé</span></td>
    <?php } else { ?>
      <td class="heure">
        <span><?php echo get_option('vendredi_mide_de'); ?></span> -
        <span><?php echo get_option('vendredi_mide_a'); ?></span><br />
        <span><?php echo get_option('vendredi_soir_de'); ?></span> -
        <span><?php echo get_option('vendredi_soir_a'); ?></span>
      </td>
    <?php } ?>
  </tr>

  <tr class="item-heure">
    <td class="day">Samedi</td>
    <?php if(checked(1, get_option('samedi_fermer'), false)) { ?>
      <td class="close"><span>Fermé</span></td>
    <?php } else { ?>
      <td class="heure">
        <span><?php echo get_option('samedi_mide_de'); ?></span> -
        <span><?php echo get_option('samedi_mide_a'); ?></span><br />
        <span><?php echo get_option('samedi_soir_de'); ?></span> -
        <span><?php echo get_option('samedi_soir_a'); ?></span>
      </td>
    <?php } ?>
  </tr>

  <tr class="item-heure">
    <td class="day">Dimanche</td>
    <?php if(checked(1, get_option('dimanche_fermer'), false)) { ?>
      <td class="close"><span>Fermé</span></td>
    <?php } else { ?>
      <td class="heure">
        <span><?php echo get_option('dimanche_mide_de'); ?></span> -
        <span><?php echo get_option('dimanche_mide_a'); ?></span><br />
        <span><?php echo get_option('dimanche_soir_de'); ?></span> -
        <span><?php echo get_option('dimanche_soir_a'); ?></span>
      </td>
    <?php } ?>
  </tr>

</table>
