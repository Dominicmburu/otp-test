<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		.container{
			display: flex;
			justify-content: center;
		}
		.pay{
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.pay input{
			margin: 10px 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="" method="post">
			<div class="pay">
				<input type="number" id="phoneNumber" placeholder="Enter your phone number">
				<input type="number" id="amount" placeholder="Enter amount">
			</div>
			<input type="submit" id="btn">
		</form>
	</div>
</body>
</html>