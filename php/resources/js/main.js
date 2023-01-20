window.addEventListener("load", function() {
    var addressForm = document.getElementById('address_form');

    var originalParams;
    var standardizedParams;

    addressForm.addEventListener('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        show_loader();

        originalParams = {
            addressLine1: document.getElementById('addressLine1').value,
            addressLine2: document.getElementById('addressLine2').value,
            city: document.getElementById('city').value,
            state: document.getElementById('state').value,
            zip: document.getElementById('zip').value
        };

        // Todo: create a RequestHandler method that will handle all the requests to avoid code duplicates
        urlEncodedData = "";

        for (name in originalParams) {
            urlEncodedData += name + '=' + originalParams[name] + '&'
        }

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4) {
                var response = JSON.parse(xhr.responseText);

                hide_loader();

                if (xhr.status === 200) {
                    var successAllert = document.getElementById('success_alert');
                    successAllert.style.display = 'none';

                    // Todo: move this to separate function
                    standardizedParams = {
                        addressLine1: response.address1[0],
                        addressLine2: response.address2[0],
                        city: response.city[0],
                        state: response.state[0],
                        zip: response.zip[0]
                    }

                    var originalAddressLine1 = document.getElementById('original_addressLine1');
                    var originalAddressLine2 = document.getElementById('original_addressLine2');
                    var originalCity = document.getElementById('original_city');
                    var originalState = document.getElementById('original_state');
                    var originalZip = document.getElementById('original_zip');

                    var standardizedAddressLine1 = document.getElementById('standardized_addressLine1');
                    var standardizedAddressLine2 = document.getElementById('standardized_addressLine2');
                    var standardizedCity = document.getElementById('standardized_city');
                    var standardizedState = document.getElementById('standardized_state');
                    var standardizedZip = document.getElementById('standardized_zip');

                    originalAddressLine1.textContent = originalParams['addressLine1'];
                    originalAddressLine2.textContent = originalParams['addressLine2'];
                    originalCity.textContent = originalParams['city'];
                    originalState.textContent = originalParams['state'];
                    originalZip.textContent = originalParams['zip'];

                    standardizedAddressLine1.textContent = standardizedParams['addressLine1'];
                    standardizedAddressLine2.textContent = standardizedParams['addressLine2'];
                    standardizedCity.textContent = standardizedParams['city'];
                    standardizedState.textContent = standardizedParams['state'];
                    standardizedZip.textContent = standardizedParams['zip'];


                    open_modal();
                } else {
                    alert(response.message);
                    // Todo: integrate bootstrap alert modal
                }
            }
        }
        xhr.open('POST', '/validate');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(urlEncodedData);
    });

    var submitAddressButton = document.getElementById('submit_address');

    submitAddressButton.addEventListener('click', function () {
        show_loader();

        var selectedArea = document.getElementsByClassName('nav-item active')[0];
        var params = selectedArea.id === 'original_nav' ? originalParams : standardizedParams;

        urlEncodedData = "";

        for (name in params) {
            urlEncodedData += name + '=' + params[name] + '&'
        }

        var successAllert = document.getElementById('success_alert');
        successAllert.style.display = 'none';

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4) {
                hide_loader();

                if (xhr.status === 200) {
                    successAllert.style.display = 'block';
                } else {
                    alert(response.message);
                    // Todo: integrate bootstrap alert modal
                }
            }
        }
        xhr.open('POST', '/submit');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(urlEncodedData);
    })

});