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
        
        <h5 class='h2 text-center'><?= $this->_content['aboutus']['title'] ?> 
        <?= CustomFunctions::editBtn('aboutus') ?> 
        </h5>
        
        <div class='container'>
            <div class='row'>
                <div class='col-md-2'></div>
                <div class='col-md-8 card '> 
                    <div class=' alert'>  
                        <?= $this->_content['aboutus']['body'] ?>
                    </div>
                    
                </div>
                <div class='col-md-2'></div>
            </div>
        </div>
 

    </main>

<br>


    <?php require 'public/includes/footer.inc.php'; ?>
</body>

</html>