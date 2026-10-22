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
        
        <h5 class='h2 text-center'>Categories </h5>
        
        <div class='container'>
            <div class='row'>
                <?php foreach($this->blog[1] as $row) { ?>
                <div class='col-md-4'>
                    <div class='alert card'>
                        <img class='card-img-top' src='/<?= UPLOADS?>/<?= $row['bc_image'] ?>'>
                        <div class='card-body'>
                            <h3 class='card-heading'><?= $row['bc_name'] ?></h3>
                            <p><?= CustomFunctions::trimTitle($row['bc_desc'], 4) ?></p>
                            <a href='/blog/categories/<?= $row['bc_url'] ?>' class='card-heading'>Read more</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                
                
                     <div class="clearfix <?= empty($this->blog[0]) ? "hidden" : ""; ?>">
                        <ul class="pagination table-responsive">
                            <li class="page-item">
                                <?php $pg = '';  ?>
                                <a href='/blog/categories/?pg=<?= $this->currentpage > 1 ? $this->currentpage - 1 : 1; ?>' class="page-link">Previous</a>
                            </li>
                            <?php  
                                   
                                for($currentPage = 1; $currentPage <= ceil($this->blog[0] / $this->_company['user_loop_sequence']); $currentPage++){
                                    echo"
                                    <li class='page-item'><a href='/blog/categories/?pg=$currentPage' class='page-link'> $currentPage </a></li>";
                                }
                            
                                if ( ceil($this->blog[0] / $this->_company['user_loop_sequence']) > 1 )  {
                            ?>
                            
                            <li class="page-item"><a href='/blog/categories/?pg=<?= $this->currentpage + 1; ?>' class="page-link ">Next</a></li>
                            <?php } ?>
                        </ul>
                    </div>
               
           
            </div>
        </div>
 

    </main>

<br>


    <?php require 'public/includes/footer.inc.php'; ?>
</body>

</html>