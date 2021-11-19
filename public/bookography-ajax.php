<?php
//when the user sends the booking request
function bookography_send_booking() {

    //get the posted data from the contact form
    $customerName = $_POST['customerName'];
    $customerMail = $_POST['customerMail'];
    $bookedDate = $_POST['bookedDate'];
    $shootingOption = $_POST['shootingOption'];
    $paymentOption = $_POST['paymentOption'];

    $message = "false";

    if ($customerName !== "" && $customerMail !== "" && $bookedDate !== "" && $shootingOption !== "" && $paymentOption !== "") {
        $message = "true";
    }

    //sending an email to the customer
    $msg = "Thank you for your booking!\nWe hereby confirm that we have received the following booking:\nName: $customerName,\nDate for booked session: $bookedDate,\nChosen session: $shootingOption,\nChosen payment option: $paymentOption\nWe are looking forward to meeting you!\n";
    
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    
    // send email but needs to get changed to companymail
    mail($customerMail,"Confirmation of booking",$msg, "From: m.deuretzbacher@yahoo.se");
    //the entered data gets sent back to the customer

    $data = [
        'message' => $message,
        'name' => $customerName,
        'mail' => $customerMail,
        'date' => $bookedDate,
        'session' => $shootingOption,
        'payment' => $paymentOption
    ];
    //encode to json
    echo json_encode($data);
    exit;
}