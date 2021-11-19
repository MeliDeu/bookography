"use strict";

let requestBtn = document.getElementById('bookingReqBtn');
let allInputs = document.querySelectorAll('.formInput');

requestBtn.addEventListener('click', event => {
    //we get all the values from the input-fields
    let customerName = document.getElementById('customerName').value;
    let customerMail = document.getElementById('customerMail').value;
    let bookedDate = document.getElementById('bookedDate').value;
    let shootingOption = document.getElementById('shootingOption').value;
    let paymentOption = document.getElementById('paymentOption').value;
    //make an object according to the requested formate
    let newRequestObj = {
        action: 'bookography_send_booking',
        customerName,
        customerMail,
        bookedDate,
        shootingOption,
        paymentOption
    };
    //the request with AJAX is always done to this endpoint
    // let request = new Request('/wordpress/wp-admin/admin-ajax.php', {
    let request = new Request('wp-admin/admin-ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' //the content type is always the same
        },
        //wordpress is not sending in JSON-formate
        body: String(new URLSearchParams(newRequestObj))
    });

    fetch(request)
        .then(res => {
            return res.json();
        })
        .then(json => {
            console.log(json);
            if (json.message) {
                alert(`Thank you, ${json.name}, for your Booking for a ${json.session} on the ${json.date}!`);
                allInputs.forEach(input => { //
                    input.value = "";
                });
            } else {
                alert("Oh no, something went wrong!");
            }
        });
});