<script LANGUAGE="JavaScript" SRC="/assets/scripts/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
    $('document').ready(function(){

        $.ajax({
            type: 'GET',
            url: "http://data.cityofchicago.org/api/views/i6bp-fvbx/rows.json?jsonp=?",
            dataType: 'jsonp',
            data: {search : 'keeler'},
            crossDomain: true,
            success: function(response) {

                $.each(response.data, function (index, value) {

                    var string = String(value);
                    var word = string.split(",");
                    var street = word[8];
                    $('#data_box').append('<p>'+street+'</p>');

                    });               

                }

        });

    });
</script> 