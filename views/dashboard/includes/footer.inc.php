<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
 
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="/"> <?php echo $this->_settings['site_name'] ?></a>.</strong> All rights reserved.
</footer>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/jquery.overlayScrollbars.min.js"></script>
<script src="/assets/js/adminlte.min.js"></script>
<script src='/assets/js/dashb.js?v=<?php echo rand() ?>'></script>
<?php  if ($this->_settings['sessions_last'] == 'True') { ?>
<script>
    setInterval(function() {
       _data(new FormData(), 'session_last_longer');  
    }, 1000*60*20 );
    
</script>
<?php } ?>
