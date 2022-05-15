
<script type="text/JavaScript">
    localStorage.clear();
    window.location = './index.php';
    <?php
        session_start();
        session_unset();
        session_destroy();
        //header("location: index.php");
        //exit();
    ?>;
</script>






