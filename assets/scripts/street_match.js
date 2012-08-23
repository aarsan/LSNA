
                $('#data_box').append('<h2>Pick a matching street</h2>');

                $.each(response.data, function (index, value) {

                    var string = String(value);
                    var word = string.split(",");
                    var street = word[8];
                    var id = word[0];
                    var min = word[13];
                    var max = word[14];
                    $('#data_box').append('<li><a href="/select/street/' +id+' "> '+street+' :: Address range: '+min+' to '+max+' </a></li> ');

                    });