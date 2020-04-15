<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $website_info->website_title; ?></title>
</head>
<body>
<?php echo form_open('payment/'.$this->session->userdata('orderNumberSet').'/'.$this->session->userdata('cus_id').'/'.$this->session->userdata('key')); ?>
    <script
    	src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    	data-key="<?php echo $my_stripe->sg_api_key; ?>"
    	data-amount="<?php echo $amount; ?>00"
    	data-locale="us-en"
    	data-name="<?php echo $website_info->website_name; ?>"
    	data-description="<?php echo $item_name; ?>"
    	data-image="<?php echo base_url(); ?>statics/uploads/pref_settings/favicon.png"
      data-currency="<?php echo strtolower($website_info->website_currency); ?>"
    	data-locale="auto">
    </script>
<?php echo form_close(); ?>
</body>
</html>