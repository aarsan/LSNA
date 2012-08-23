				var full_name = (response.full_street_name);
				var dir = (response.direction);
				var street = (response.street);
				var suff = (response.suffix);
				var min = (response.min_address);
				var max = (response.max_address);

                $('#data_box').html('<h2>You selected the following street:</h2>');
                $('#data_box').append(' <strong> '+full_name+' </strong> ');
                $('#data_box').append('<p>Address must fall within the range below:</p>');
                $('#data_box').append(' '+min+' to '+max+' ');
                $('#data_box').append('</br><form><input type="text" name="number" />');
                $('#data_box').append('<input type="submit" value="Enter Property" /></form>');


