<?php if($get_stat): ?>
<h4 class="text-center">We have Total ( <font color="blue"><?php echo $get_stat; ?></font> ) Customer(s)</h4>
<?php else: ?>
<div class="alert alert-info"><h3 class="text-center">We do not have any Customer at this Moment!</h3></div>
<?php endif; ?>