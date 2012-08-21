<script LANGUAGE="JavaScript" SRC="/scripts/jquery-1.7.1.js"></script>
<script type="text/javascript">
$('document').ready(function(){
    $('#button').click(function(){
        $.ajax({
            type: 'post',
            url: "/lsna/address",
            data: $('#address_query').serialize(),
            
            success: function(data) {

                    $('#data_box').html(data);
                }

        });

    });

});
</script> 