<style>
    .card-counter{
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover{
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary{
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger{
        background-color: #ef5350;
        color: #FFF;
    }  

    .card-counter.success{
        background-color: #66bb6a;
        color: #FFF;
    }  

    .card-counter.info{
        background-color: #26c6da;
        color: #FFF;
    }  

    .card-counter i{
        font-size: 5em;
        opacity: 0.2;
    }

    .card-counter .count-numbers{
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 32px;
        display: block;
    }

    .card-counter .count-name{
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }
</style>
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
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

      <div class="container">
        <div class="row">
        <div class="card col-md-3">
          <div class="card-counter primary">
            <i class="fa fa-check"></i>
            <span class="count-numbers"><?php echo $all_product; ?></span>
            <span class="count-name">All Products</span>
          </div>
        </div>

        <div class="card col-md-3">
          <div class="card-counter danger">
            <i class="fa fa-folder"></i>
            <span class="count-numbers"><?php echo $all_product_cat; ?></span>
            <span class="count-name">Main Categories</span>
          </div>
        </div>

        <div class="card col-md-3">
          <div class="card-counter success">
            <i class="fa fa-database"></i>
            <span class="count-numbers"><?php echo $all_product_sub_cat; ?></span>
            <span class="count-name">Sub Categories</span>
          </div>
        </div>

        <div class="card col-md-3">
          <div class="card-counter info">
            <i class="fab fa-codiepie"></i>
            <span class="count-numbers"><?php echo $all_product_brands; ?></span>
            <span class="count-name">Product Brands</span>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
        <div class="row">
        <div class="card col-md-3">
          <div class="card-counter success">
            <i class="fa fa-users"></i>
            <span class="count-numbers"><?php echo $all_customers; ?></span>
            <span class="count-name">Customers</span>
          </div>
        </div>

        <div class="card col-md-3">
          <div class="card-counter info">
            <i class="fa fa-money-bill"></i>
            <span class="count-numbers"><?php echo $all_orders; ?></span>
            <span class="count-name">Orders</span>
          </div>
        </div>

        <div class="card col-md-3">
          <div class="card-counter primary">
            <i class="fa fa-dollar-sign"></i>
            <span class="count-numbers"><?php echo $website_info->website_currency_symbol . ' ' . number_format($all_earnings); ?></span>
            <span class="count-name">Earnings</span>
          </div>
        </div>

        <div class="card col-md-3">
          <div class="card-counter danger">
            <i class="fa fa-bus"></i>
            <span class="count-numbers"><?php echo $no_delivery; ?></span>
            <span class="count-name">Awaiting Delivery</span>
          </div>
        </div>
      </div>
    </div>
    
    </div>
</div>