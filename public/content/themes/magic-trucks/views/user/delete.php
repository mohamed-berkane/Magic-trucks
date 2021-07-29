<?php
    get_header();
    $message = $args['message'];
?>
<style>

.mt {
    margin-top:150px;
}

.half {
    color:black; 
    background:#fff; 
    width:100%
}

.header-block__link--return {
    text-align:right; 
    padding: 0 1rem;
}



.half {
    padding: 5rem;
    border-radius: 6px;
    width: 90%;
    margin: auto;
}


</style>

<div class="container-fluid mt">
    <div class="row" style="display: flex;">

        <div class="half">
            
            <?php
                if(isset($message)) :
            ?>
                <div class="alert alert-success" role="alert">
                    <?= $message; ?>
                </div>
            <?php        
                endif;
            ?>
            <p></p>
            <a class="header-block__link--return" href="/apotheose/magic-trucks/public/">Retour à l'accueil</a>
        </div>
            
    </div>
</div>    
<?php
    get_footer();