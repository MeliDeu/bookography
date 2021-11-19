<?php
function bookography_create_shortcode($attributes=[], $content=null) { //this function creates the form and gets the values from the admin panel
    //including the css
    wp_register_style('bookography-public.css', plugin_dir_url(__FILE__) . 'css/bookography-public.css');
    wp_enqueue_style('bookography-public.css');
    //including the script
    wp_register_script('bookography-public.js', plugin_dir_url(__FILE__) . 'js/bookography-public.js');
    wp_enqueue_script('bookography-public.js');

    //gets the predefined categories and payment methods
    $category = get_option('category');
    $payment = get_option('payment');
    $companyMail = get_option('companyMail');
    $categoryArr = explode(',', $category);
    $paymentArr = explode(',', $payment);
    $filteredCategoryArr = array_filter($categoryArr, 'strlen'); //predefined: removes empty strings, false and undefined but 0 remains
    $filteredPaymentArr = array_filter($paymentArr, 'strlen');

    //we echo out the html because we dynamically need to make options for each select option
    echo "
    <div id='formContainer'>
        <h1 class='bookingForm'>Booking form</h1>
        <p class='bookingForm'>Simply fill out the following contact form and we will get back to you as soon as possible.</p>
        <div id='formFields'>
            <div>
                <label for='name'>Full Name</label>
                <input class='formInput' id='customerName' name='customerName' type='text' placeholder='Enter your name' required>
            </div>
            <div>
                <label for='mail'>Email</label>
                <input class='formInput' id='customerMail' name='customerMail' type='email' placeholder='yourmail@mail.se' required>
            </div>
            <div>
                <label for='bookedDate'>Book date</label>
                <input class='formInput' type='date' id='bookedDate' name='bookedDate' required>
            </div>
            <div>
                <label>Shooting Options</label>
                <select id='shootingOption' name='shootingOption'>
    ";
    foreach($filteredCategoryArr as $cat){ //for each category we make an option
        echo "<option value='$cat'>$cat</option>";
    };
    echo "
                </select>
            </div>
            <div>
                <label>Payment Options</label>
                <select id='paymentOption' name='paymentOption'>  
            
    ";
    foreach($filteredPaymentArr as $pay){ //for each payment method we make an option
        echo "<option value='$pay'>$pay</option>";
    };
    echo "
                </select>
            </div>
        </div>
        <button id='bookingReqBtn'>Send request</button>
    </div>
    ";
}
