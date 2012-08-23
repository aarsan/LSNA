				var full_name = (response.full_street_name);
				var min = (response.min_address);
				var max = (response.max_address);

                $('#data_box').html('<h2>You selected the following street:</h2>');
                $('#data_box').append(' <strong> '+full_name+' </strong> ');
                $('#data_box').append('<p>Address must fall within the range below:</p>');
                $('#data_box').append(' '+min+' to '+max+' ');
                $('#data_box').append('</br><form action="/properties/add" method="post"><input type="text" name="number"><input type="hidden" name="street" value=" '+full_name+' ">');
                $('#data_box').append('<input type="hidden" name="street" value=" '+full_name+' ">');
                $('#data_box').append('<input type="submit" name="enter" value="Enter Property">');
                $('#data_box').append('</form>');


