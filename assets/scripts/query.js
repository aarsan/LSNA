<script LANGUAGE="JavaScript" SRC="/assets/scripts/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
    $('document').ready(function(){

        $.ajax({
            type: 'GET',
            url: "http://data.cityofchicago.org/api/views/i6bp-fvbx/rows.json?jsonp=?",
            dataType: 'jsonp',
            data: <?php echo $dataset; ?>,
            crossDomain: true,
            success: function(response) {

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