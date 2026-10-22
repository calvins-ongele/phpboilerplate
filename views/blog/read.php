<!DOCTYPE html>
<html lang="en">

<head>
    <?php  require 'public/includes/header.inc.php'; ?>
</head> 

<body>

    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>


    <header class="header">

        <?php  require 'public/includes/navbar.inc.php'; ?>
       
    </header>

    <main class="main">
        
        <h5 class='h2 text-center'><?= $this->blog[0]['blog_title'] ?> </h5>
        
        <div class='container'>
            
               
                    <div class='alert card'>
                        <img class='card-img-top' src='/<?= UPLOADS?>/<?= $this->blog[0]['blog_image'] ?>'>
                        <div class='card-body'>
                            <h3 class='card-heading'><?= $this->blog[0]['blog_title'] ?></h3>
                            <p><?=  $this->blog[0]['blog_content']  ?></p>
                            
                        </div>
                    </div>
            
        </div>
 

    </main>

<br>


    <?php require 'public/includes/footer.inc.php'; ?>
</body>

</html>