<?php
	/*
	https://www.bitstamp.net/api/ticker/
	*/
	function bitstampticker () {
		// $file = 'bitstamp.json';
		$json_url = "https://www.bitstamp.net/api/ticker/";
		$json = file_get_contents($json_url);
		// file_put_contents($file, $json);
		$data = json_decode($json);
		return $data->last;
	}
?>

<?php
	/*
	https://poloniex.com/public?command=returnTicker
	*/
	function poloniexticker () {
		$json_url = "https://poloniex.com/public?command=returnTicker";
		$json = file_get_contents($json_url);
		$data = json_decode($json);
		return $data->BTC_ETH->last;
	}
?>

<?php
	/*
	https://bittrex.com/api/v1.1/public/getticker?market=btc-ltc
	https://bittrex.com/api/v1.1/public/getticker?market=btc-byc
	https://bittrex.com/api/v1.1/public/getticker?market=btc-xmr
	*/
	function bittrexticker($coin) {
		$json_url = "https://bittrex.com/api/v1.1/public/getticker?market=btc-" . $coin;
		$json = file_get_contents($json_url);
		$data = json_decode($json);
		return number_format($data->result->Last, 8);
	}
?>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Paradigma Crypto Portal">
    <meta name="author" content="Paradigma software">
    <meta http-equiv="refresh" content="60">

    <title>Project Crypto</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
 <!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Crypto</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="#">Settings</a>
					</li>
					<li>
						<a href="#">Help</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Page Content -->
	<div class="container">

		<div class="row">
			<div class="col-lg-6 text-left">
				<!-- <h1>A Bootstrap Starter Template</h1> -->
				<!-- <p class="lead">Complete with pre-defined file paths that you won't have to change!</p> -->
					<?php 
						echo "<span class=\"label label-info\">Bitstamp</span>";
                        echo "<pre>";
						echo ("Bitcoin:  " . "$" . bitstampticker());
						echo "</pre>";
                
                        
                        echo "<span class=\"label label-info\">Poloniex</span>";
                        echo "<pre>";
						echo ("Ethereum: " . poloniexticker());
						echo "</pre>";
						
						
                        echo "<span class=\"label label-info\">Bittrex</span>";
                        echo "<pre>";
						echo ("Monero:   " . bittrexticker ("xmr"));
						echo "</pre>";
						
						echo "<pre>";
						echo ("Bytecent: " . bittrexticker ("byc"));
						echo "</pre>";
						
						echo "<pre>";
						echo ("Ethereum: " . bittrexticker ("eth") . "\n");
						echo ("Shift:    " . bittrexticker ("shf") . "\n");
						echo ("Expense:  " . bittrexticker ("exp") . "\n");
						echo "</pre>";
					?>
			</div>
		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
