<button id="rzp-button1" style="display: none;">Pay</button>
<a href="<?php echo base_url('/signup') ?>">Back</a>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "<?= $key_id ?>", // Enter the Key ID generated from the Dashboard
        "amount": "<?= $amount ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Razorpay Test",
        "description": "Test Transaction",
        "image": "https://example.com/your_logo",
        "order_id": "<?= $razorpayOrder['id'] ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "callback_url": "<?php echo base_url('/memberships/payment_status/'."$customer_id") ?>",
        "prefill": {
            "name": "<?= $customer_name ?>",
            "email": "<?= $email ?>",
            "contact": "<?= $contact ?>"
        },
        "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "#fd746c"
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }
    document.getElementById('rzp-button1').click();
</script>