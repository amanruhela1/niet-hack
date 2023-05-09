var options = {
    key: 'rzp_test_lLhJ1ds0bEQfzc', // Replace with your Key ID
    amount: 100, // The amount to be charged in the smallest currency unit (e.g., paise for INR)
    currency: 'INR', // The currency code
    name: 'SANKAT', // Displayed on the Razorpay Checkout page
    description: 'Purchase Description', // Displayed on the Razorpay Checkout page
    handler: function(response) {
      // This function will be called after a successful payment
      // You can handle the payment response here
      alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
    }
  };
  
  var rzp = new Razorpay(options);
  
  document.getElementById('rzp-button').onclick = function() {
    rzp.open();
  };
  