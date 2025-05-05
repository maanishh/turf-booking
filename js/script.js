//Dropdown list
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
}

// popup select dates
// Open Form
function openForm() {
  document.getElementById("popupForm").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

// Close Form
function closeForm() {
  document.getElementById("popupForm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}

// payment toggle
function togglePaymentMethod() {
  const cardDetails = document.getElementById('card-details');
  const upiDetails = document.getElementById('upi-details');
  const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

  if (paymentMethod === 'Card') {
      cardDetails.classList.remove('hidden');
      upiDetails.classList.add('hidden');
      
      // Add required attributes for card inputs
      document.querySelector('input[name="name"]').setAttribute('required', 'true');
      document.querySelector('input[name="card_number"]').setAttribute('required', 'true');
      document.querySelector('input[name="expiry"]').setAttribute('required', 'true');
      document.querySelector('input[name="cvv"]').setAttribute('required', 'true');

      // Remove required attribute from UPI input
      document.querySelector('input[name="upi_id"]').removeAttribute('required');
  } 
  else if (paymentMethod === 'UPI') {
      upiDetails.classList.remove('hidden');
      cardDetails.classList.add('hidden');

      // Add required attribute for UPI input
      document.querySelector('input[name="upi_id"]').setAttribute('required', 'true');

      // Remove required attributes from card inputs
      document.querySelector('input[name="name"]').removeAttribute('required');
      document.querySelector('input[name="card_number"]').removeAttribute('required');
      document.querySelector('input[name="expiry"]').removeAttribute('required');
      document.querySelector('input[name="cvv"]').removeAttribute('required');
  }
}