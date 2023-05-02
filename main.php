
    <?php include('includes/header.php'); ?>

    <?php
    if (isset($_GET['page'])) {
        $pageSlug=$_GET['page'];
   
        if ($pageSlug=='hakkimda') {
            require "about.php";
        }elseif($pageSlug=='hizmetler'){
            require "services.php";
        }elseif($pageSlug=='iletisim'){
            require "contact.php";
        }else {
            require "index.php";
        }
    }
    
    ?>
  
    <?php include('includes/footer.php'); ?>
