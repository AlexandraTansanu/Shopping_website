window.addEventListener('load', function() {
    'use strict';

    /* Get a reference of the form */
    const l_form = document.getElementById('orderForm');

    /* Claculate the total */
    l_form.onchange = calculateTotal;
    function calculateTotal() {
        let l_total =  0;

        /* Get a reference of the book array */
        const l_books = l_form.querySelectorAll('div.item');
        const l_booksCount = l_books.length;

        /* check which has been checked and add to total*/
        for (let t_i = 0; t_i < l_booksCount; t_i++) {
            const t_book = l_books[t_i];
            
            const t_checkbox = t_book.querySelector('input[data-price][type=checkbox]');

            if(t_checkbox.checked) { 
                l_total += parseFloat(t_checkbox.dataset.price); 
            }
        }

        if(l_total != 0.00) { // the shipping cost should not appear if no book has been checked
            /* Extract the shipping cost and add it to total*/
            const l_shippingCosts = l_form.querySelectorAll('input[name=deliveryType]');
            const l_shippingCostsLength = l_shippingCosts.length;

            for(let t_i = 0; t_i < l_shippingCostsLength; t_i++) {
                const t_radioButton = l_shippingCosts[t_i];
    
                if(t_radioButton.checked) {
                    l_total += parseFloat(t_radioButton.dataset.price); // it gets added to the total when the first book checked
                }
            }
        }

        l_form.total.value = l_total.toFixed(2);
    }
    
    /* Display the company name for corporate customers and hide other unnecessary fields */
    l_form.customerType.onclick = function() {
        if(l_form.customerType.value == "ret") {
            document.getElementById('retCustDetails').setAttribute("style", "");
            document.getElementById('tradeCustDetails').setAttribute("style", "visibility: hidden");
        }
        else if(l_form.customerType.value == "trd") {
            document.getElementById('retCustDetails').setAttribute("style", "visibility: hidden");
            document.getElementById('tradeCustDetails').setAttribute("style", "");
        }
    } 


    /* Modify the CSS for terms and condition checkbox and enable the submit button if it has been checked */
    l_form.termsChkbx.onclick = function() {
        if(l_form.termsChkbx.checked) {
           document.getElementById('termsText').setAttribute("style", "color: black; font-weight: normal");
            l_form.submit.disabled = false;
        }
        else {
            document.getElementById('termsText').setAttribute("style","color: #FF0000; font-weight: bold");
            l_form.submit.disabled = true;
        }
    }

    /* Check the form and prevent submitting values if something went wrong */
    l_form.submit.onclick = checkForm;
    function checkForm(_evt) {
        let l_failed = false;

        /* check that the user has enetered a a customer type and then validate the appropiate credentials */
        if(!l_form.customerType.value) {
            l_failed = true;
            alert("You must choose a customer type!");
        }
        else {
            /* check that the user has enetered a surname */
            if((l_form.customerType.value == "ret") && !l_form.surname.value) {
                l_failed = true;
                alert("You must enter your surname!");
            }

            /* check that the user has entered a forename */
            if((l_form.customerType.value == "ret") && !l_form.forename.value) {
                l_failed = true;
                alert("You must enter your forename!");
            }

            /* check that the user has eneterd a company name */
            if((l_form.customerType.value == "trd") && !l_form.companyName.value) {
                l_failed = true;
                alert("You must enter your company name!");
            }
        }

        /* check that the user has choosen at least one book */
        if(l_form.total.value == 0.00) {
            l_failed = true;
            alert("You must buy at least one book!");
        }

        if(l_failed == true) {
            _evt.preventDefault();
        }
    }

});