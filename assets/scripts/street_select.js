				var full_name = (response.full_street_name);
				var min = (response.min_address);
				var max = (response.max_address);

                $('#data_box').html('<h2>You selected the following street:</h2>');
                $('#data_box').append(' <strong> '+full_name+' </strong> ');
                $('#data_box').append('<p>Address must fall within the range below:</p>');
                $('#data_box').append(' '+min+' to '+max+' ');
                $('#data_box').append('</br><form action="/properties/add" method="post"><label for="number">House Number:</label><input type="text" name="number"></br><label for="zip">Zip Code:</label><input type="hidden" name="street" value=" '+full_name+' "><input type="text" name="zip"></br></br><input type="submit" value="Enter Property"></form>');


