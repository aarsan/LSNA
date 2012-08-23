<script LANGUAGE="JavaScript" SRC="/assets/scripts/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
    $('document').ready(function(){

        $.ajax({
            type: 'GET',
            url: "http://data.cityofchicago.org/api/views/i6bp-fvbx/rows/<?php echo $add_id; ?>.json",
            dataType: 'jsonp',
            data: <?php echo $dataset; ?>,
            crossDomain: true,
            success: function(response) {

                $('#data_box').append('<h2>Pick a matching street</h2>');

                $.each(response.data, function (index, value) {

                    var string = String(value);
                    var word = string.split(",");
                    var street = word[8];
                    var id = word[0];
                    $('#data_box').append('<li><a href="'+id+'">'+street+'</a></li>');

                    });               

                }

        });

    });
</script> 