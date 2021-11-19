"use strict";

//variables for the setting page
let categoryInputs = document.querySelectorAll(".infoItem");
let categoryBox = document.getElementById("categoryBox");
let paymentBox = document.getElementById("paymentBox");
let categoryInput = document.getElementById("newCategory");
let paymentInput = document.getElementById("payment");

//variables for the overview page
let overviewContainer = document.getElementById("bookography-overview-container");
//function for making overview boxes
function bookography_create_overview(){
    let newGetReq = new Request('/wordpress/wp-admin/options.php');

    fetch(newGetReq)
        .then(res => res.json())
        .then(data => {
            console.log(data);
        });
}



//function for making boxes
function makeItems(inputField, container) {
    let inputVal = inputField.value;
    inputVal = inputVal.split(","); //separates by comma
    inputVal = inputVal.filter(val => val !== ""); //removes empty strings
    container.innerHTML = ""; //empty the container
    inputVal.forEach(val => { //make a box for each alternative
        let newItem = document.createElement("div");
        newItem.innerText = val;
        newItem.classList.add("listItem");
        container.append(newItem);
    });
}

categoryInputs.forEach(input => { //every key press modifies the added categories
    input.addEventListener("keyup", (event) => {
        let currentCont; //saves current categorybox
        if (event.target.id === "newCategory") { //assignment of right box
            currentCont = categoryBox;
        } else {
            currentCont = paymentBox;
        }
        makeItems(event.target, currentCont);
    });
});

if (categoryInput !== undefined && categoryInput !== null){
    makeItems(categoryInput, categoryBox);
    makeItems(paymentInput, paymentBox);
}

if (overviewContainer !== undefined && overviewContainer !== null) {
    bookography_create_overview();
}