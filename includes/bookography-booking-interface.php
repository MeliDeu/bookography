<h3>Booking settings</h3>
<p>On this page you can define the categories for the contactform as well as your own information for getting the bookings for sessions directly to your email inbox</p>
<p>Simply type the wanted category into the text field and separate them with a comma (","). Add a comma even in case you only would like to add one category</p>
<!-- we are sending the data from the form to options.php with the POST-method -->
<form action="options.php" method="POST">
    <?php
    //here we save all the information of the form under bookography-options
        settings_fields('bookography-options');
    ?>
    <div id="categoryContainer">
        <div class="labelCont">
            <label for="category">Session Categories</label>
            <input value="<?=get_option('category')?>" class="infoItem" id="newCategory" type="text" name="category" placeholder="Enter new category" required>
        </div>
        <div id="categoryBox" class="flexCont"></div>
    </div>
    <div id="paymentInformation">
        <div class="labelCont">
            <label for="payment">Available Payment Options</label>
            <input value="<?=get_option('payment')?>" class="infoItem" id="payment" type="text" name="payment" placeholder="Enter form of payment" required>
        </div>
        <div id="paymentBox" class="flexCont"></div>
    </div>
    <div id="ownMail">
        <input value="<?=get_option('companyMail')?>" name="companyMail" type="email" placeholder="Enter your email" required>
    </div>
    <?php submit_button(); ?>
</form>
<?php