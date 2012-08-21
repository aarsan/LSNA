<script LANGUAGE="JavaScript" SRC="/assets/scripts/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$('document').ready(function(){
    $('#button').click(function(){
        $.ajax({
            type: 'post',
            url: "/verify/address",
            data: $('#address_query').serialize(),
            
            success: function(data) {

                    $('#data_box').html(data);
                }

        });

    });

});
</script> 