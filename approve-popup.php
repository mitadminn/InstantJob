<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 <style>
    
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    text-align: center;
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 35%;
}

.close {
    color: #aaaaaa;
position: absolute;
    top: 0;
    right: 10px;
}

.close:hover {
    background-color:#fff !important;
    color: #aaaaaa !important;
}
button.btn.btn-danger.acnt-btn {
    margin-top: 20px;
}
@media only screen and (max-width: 767px) {
 .modal-content {
    background-color: #fefefe;
    margin: 60% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 90%;
    text-align: center;
}
}
.verify-accnt-clr{
    background: #00c853; 
    color: #fff;
}
.sign-in-contact{
    background: #e5e5e5;
    color: #646464;
}

</style>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
         <?php if(empty($_SESSION['Userid'])) {?>
         <p>Please login with your account first<br>
        <?php } elseif(!empty($user_verifyn['FullName'] || !empty($user_information['CompanyName']))) {?>
         <p>Your account information has been received, please check the status with admin<br>
        <?php } else { ?>
         <p>Your account has not been verified yet, to start a job or message others, please verify your account.<br>
         <button type="button" class="btn acnt-btn verify-accnt-clr" style=""> Verify my account now</button>
        <?php } ?>
       
        <?php if(empty($_SESSION['Userid'])) {?>
        <a href="signin"><button type="button" class="btn acnt-btn sign-in-contact" >Sign In</button></a></p>
        <?php } else { ?>
        <button type="button" class="btn acnt-btn sign-in-contact" > Contact Support</button></p>
        <?php } ?>
    </div>
</div>



<script>
    // Get all elements with the class 'not-approved'
var notApprovedButtons = document.querySelectorAll('.not-approved');
// var closeButton = document.querySelector('.modal .close');

// Function to handle button click
function handleButtonClick(event) {
    // Prevent the default behavior of the button
    event.preventDefault();

    // Check if the button has the 'not-approved' class
    if (event.target.classList.contains('not-approved')) {
        // Show the modal or perform any other action for unapproved users
        showModal();
        // Do not proceed with the button action
        return false;
    }

    // If the button is approved, proceed with the button action
    // ... add code to handle the approved button action ...
}

// Attach click event handler to all elements with the class 'not-approved'
notApprovedButtons.forEach(function(button) {
    button.addEventListener('click', handleButtonClick);
});

// JavaScript to display and close the modal
var modal = document.getElementById('myModal');
var closeButton = document.querySelector('.modal .close');

// Show the modal
function showModal() {
    modal.style.display = 'block';
}


// Close the modal when the close button is clicked
closeButton.onclick = function() {
    modal.style.display = 'none';
};

// Close the modal if the user clicks outside the modal content
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

</script>