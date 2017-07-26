<?php if(isset($articles)) { ?>
    <?php if(!empty($articles)) { ?>
        <?php foreach($articles as $art) { ?>
            <h4><?php echo $art -> aart_titre ?></h4>
            <div class = "contenu-article"><?php echo $art -> aart_contenu ?></div>
        <?php } ?>
    <?php } else { ?>
        <div class = "alert alert-info">
            Les articles de cet actualité sont temporairement indisponibles.
        </div>
    <?php } ?>
<?php } else  { ?>
    <div class = "alert alert-info">
        Aucun actualité à afficher pour le moment
    </div>
<?php } ?>