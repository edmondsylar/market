<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="<?php echo base_url(); ?>" class="btn btn-blue btn-sm ml-2" data-toggle="tooltip" data-placement="top" title="Return Home">
                    <i class="mdi mdi-home"></i>
                </a>
                <a href="<?php echo base_url(); ?>admin" class="btn btn-blue btn-sm ml-1" data-toggle="tooltip" data-placement="top" title="Dashboard">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
            </div>
            <h4 class="page-title">Payment Gateways Settings</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title"><h4 class="text-center">PayPal Gateway</h4></div>
                    <div class="card-body">
                        <img src="<?php echo base_url(); ?>statics/payments/paypal/pay.png" height="150px" alt="paypal payment gateways" data-toggle="modal" data-target=".bs-example-modal-paypal" style="cursor:pointer;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-title"><h4 class="text-center">Stripe Gateway</h4></div>
                    <div class="card-body">
                        <img src="<?php echo base_url(); ?>statics/payments/stripe/pay.png" height="150px" alt="paypal payment gateways" data-toggle="modal" data-target=".bs-example-modal-stripe" style="cursor:pointer;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-title"><h4 class="text-center">Paystack Gateway</h4></div>
                    <div class="card-body">
                        <img src="<?php echo base_url(); ?>statics/payments/paystack/pay.png" height="150px" alt="paystack payment gateways" data-toggle="modal" data-target=".bs-example-modal-paystack" style="cursor:pointer;">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-paypal" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">PayPal Payment Gateway</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <div id="wait"></div>
            <div id="info"></div>
                <?php
                    $opt = ['id' => 'set_paypal'];
                    echo form_open('paypal', $opt);
                ?>
                <div class="form-group">
                  <label for="">Pypal Business Email</label>
                  <input type="email" value="<?php echo $paypal->pg_bussiness_email; ?>" class="form-control" name="pg_bussiness_email">
                </div>

                <div class="form-group">
                  <label for="">Activate Paypal Payment</label>
                  <select class="form-control" name="pg_is_active">
                    <option value="<?php echo $paypal->pg_is_active; ?>">Select Option</option>
                    <option value="1">Activate</option>
                    <option value="0">DeActivate</option>
                  </select>
                </div>

                <button type="submit" id="paypal_btn" class="btn btn-outline-primary waves-effect waves-light btn-block">Save Settings</button>
                <?php echo form_close(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-stripe" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Stripe Payment Gateway</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <div id="wait1"></div>
            <div id="info1"></div>
            <?php
                $opt = ['id' => 'set_stripe'];
                echo form_open('stripe', $opt);
            ?>
            <div class="form-group">
                <label for="">Stripe Public Key</label>
                <input type="text" value="<?php echo $stripe->sg_api_key; ?>" class="form-control" name="public_key">
            </div>

            <div class="form-group">
                <label for="">Stripe Secret Key</label>
                <input type="text" value="<?php echo $stripe->sg_secret_key; ?>" class="form-control" name="secret_key">
            </div>

            <div class="form-group">
                <label for="">Activate Stripe Payment</label>
                <select class="form-control" name="is_active">
                <option value="<?php echo $stripe->sg_is_active; ?>">Select Option</option>
                <option value="1">Activate</option>
                <option value="0">DeActivate</option>
                </select>
            </div>

            <button type="submit" id="stripe_btn" class="btn btn-outline-primary waves-effect waves-light btn-block">Save Settings</button>
            <?php echo form_close(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-paystack" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Paystack Payment Gateway</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <div id="wait2"></div>
            <div id="info2"></div>
            <?php
                $opt = ['id' => 'set_paystack'];
                echo form_open('paystack', $opt);
            ?>
            <div class="form-group">
                <label for="">Paystack Public Key</label>
                <input type="text" value="<?php echo $paystack->ps_public_key; ?>" class="form-control" name="public_key">
            </div>

            <div class="form-group">
                <label for="">Paystack Secret Key</label>
                <input type="text" value="<?php echo $paystack->ps_secret_key; ?>" class="form-control" name="secret_key">
            </div>

            <div class="form-group">
                <label for="">Activate Paystack Payment</label>
                <select class="form-control" name="is_active">
                <option value="<?php echo $paystack->ps_is_active; ?>">Select Option</option>
                <option value="1">Activate</option>
                <option value="0">DeActivate</option>
                </select>
            </div>

            <button type="submit" id="paystack_btn" class="btn btn-outline-primary waves-effect waves-light btn-block">Save Settings</button>
            <?php echo form_close(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Success show up -->
<div id="toastr-three"></div>

<!-- Danger show up -->
<div id="toastr-four"></div>