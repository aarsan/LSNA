				var dir = (response.direction);
				var street = (response.street);

                $('#data_box').html('<h2>You selected the following street:</h2>');
                $('#data_box').append(''+dir+''+street+'');