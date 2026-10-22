<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<link rel="icon" type="image/*" href="/public/assets/uploads/<?php echo $this->_company['c_icon'] ?>" />
<style>
    *{  --primary: <?= $this->_company['c_primary_color'] ?>;  }
   

</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="/public/static/custom-main.css?v=<?= rand(); //$this->version; ?>"> 
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
<title><?php echo $this->title ?> | <?= $this->page_id=='home' ? $this->_company['c_short_desc'] : $this->_company['c_name'] ?></title>
 

