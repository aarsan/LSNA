<script LANGUAGE="JavaScript" SRC="/assets/scripts/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
    $('document').ready(function(){

        $.ajax({
            type: 'GET',
            url: <?php echo $url; ?>,
            dataType: 'jsonp',
            data: <?php echo $dataset; ?>
            crossDomain: true,
            success: function(response) {

                <?php echo $response; ?>               

                }

        });

    });
</script> 