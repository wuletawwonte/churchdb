<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>General Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">

</head>
<body onload="window.print();">

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper" style="margin-left: 0px;background-color: #fff; padding-top: 20px;">

	    <!-- Main content -->
	    <section class="invoice">
	      <!-- title row -->
	      <div class="row">
	        <div class="col-xs-12">
	          <h2 class="page-header">
	            <i class="fa fa-globe"></i> <?php echo $this->session->userdata('system_name'); ?>, Inc.
	            <small class="pull-right">Date: <?= date('M-d-Y'); ?></small>
	          </h2>
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- info row -->
	      <div class="row invoice-info">
	        <div class="col-sm-4 invoice-col">
	          From
	          <address>
	            <strong>Admin, Inc.</strong><br>
	            Church<br>
	            San Francisco, CA 94107<br>
	            Phone: (804) 123-5432<br>
	            Email: info@almasaeedstudio.com
	          </address>
	        </div>
	        <!-- /.col -->
	        <div class="col-sm-4 invoice-col">
	          To
	          <address>
	            <strong><?= $_SESSION['name']; ?></strong><br>
	            <?= $church_name; ?><br>
	            San Francisco, CA 94107<br>
	            Phone: (555) 539-1037<br>
	            Email: john.doe@example.com
	          </address>
	        </div>
	        <!-- /.col -->
	        <div class="col-sm-4 invoice-col">
	          <b>Invoice #007612</b><br>
	          <br>
	          <b>Order ID:</b> 4F3S8J<br>
	          <b>Payment Due:</b> 2/22/2014<br>
	          <b>Account:</b> 968-34567
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->

	      <!-- Table row -->
	      <div class="row">
	        <div class="col-xs-12 table-responsive">
	          <table class="table table-striped">
	            <thead>
	            <tr>
	              <th>Qty</th>
	              <th>Product</th>
	              <th>Description</th>
	              <th>Subtotal</th>
	            </tr>
	            </thead>
	            <tbody>
	            <tr>
	              <td>1</td>
	              <td>Call of Duty</td>
	              <td>El snort testosterone trophy driving gloves handsome</td>
	              <td>$64.50</td>
	            </tr>
	            <tr>
	              <td>1</td>
	              <td>Need for Speed IV</td>
	              <td>Wes Anderson umami biodiesel</td>
	              <td>$50.00</td>
	            </tr>
	            <tr>
	              <td>1</td>
	              <td>Monsters DVD</td>
	              <td>Terry Richardson helvetica tousled street art master</td>
	              <td>$10.70</td>
	            </tr>
	            <tr>
	              <td>1</td>
	              <td>Grown Ups Blue Ray</td>
	              <td>Tousled lomo letterpress</td>
	              <td>$25.99</td>
	            </tr>
	            </tbody>
	          </table>
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->

	      <div class="row">
	        <!-- accepted payments column -->
	        <div class="col-xs-6">
	          <p class="lead">Payment Methods:</p>
	          <img src="../../dist/img/credit/visa.png" alt="Visa">
	          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
	          <img src="../../dist/img/credit/american-express.png" alt="American Express">
	          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

	          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
	            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
	            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
	          </p>
	        </div>
	        <!-- /.col -->
	        <div class="col-xs-6">
	          <p class="lead">Amount Due 2/22/2014</p>

	          <div class="table-responsive">
	            <table class="table">
	              <tr>
	                <th style="width:50%">Subtotal:</th>
	                <td>$250.30</td>
	              </tr>
	              <tr>
	                <th>Tax (9.3%)</th>
	                <td>$10.34</td>
	              </tr>
	              <tr>
	                <th>Shipping:</th>
	                <td>$5.80</td>
	              </tr>
	              <tr>
	                <th>Total:</th>
	                <td>$265.24</td>
	              </tr>
	            </table>
	          </div>
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->

	    </section>
	    <!-- /.content -->
	    <div class="clearfix"></div>
	  </div>

  </body>
</html>

