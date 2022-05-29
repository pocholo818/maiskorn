
<!DOCTYPE html>
<html>
	<head>
		<!-- check if ssessionstorgate is empty -->
		<script type="text/javascript">
				if (sessionStorage.getItem("arr")== null ||  sessionStorage.getItem("arr")== '') {
					window.location.replace("/pos")
				}
		</script>
		<meta charset="utf-8" />
		<title>Maiskorn</title>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0" class="tableAppend">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<h3 style="color: yellow">Maiskorn</h3>
								</td>

								<td>
									<?php date_default_timezone_set('Asia/Manila');
									 echo "Created: ". date("F j, Y, g:i: a");  ?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Maiskorn<br />
                                    East bajac-bajac Olongapo City<br />
									Zambales, 2200
                                    
								</td>

							</tr>
						</table>
					</td>
				</tr>


				<tr class="heading">
					<td>Product</td>

					<td>Product Code</td>

					<td>Quantity</td>

					<td>Price</td>

				</tr>


<script type="text/javascript">
	let myArray =  JSON.parse(sessionStorage.getItem("arr"));
	let total = 0;

	for (var i = 0; i < myArray.length; i++) {
		console.log(myArray[i]);
		$('.tableAppend').append('<tr class="item">'+
			'<td>'+ myArray[i].name +'</td>' +
			'<td>'+ myArray[i].code +'</td>' +
			'<td>'+ myArray[i].quantity +'</td>' +
			'<td>'+ myArray[i].total_price +'</td></tr>'
		)
		total+= parseFloat(myArray[i].total_price)
}
		// total
		$('.tableAppend').append('<tr class="total">'+
			'<td></td>' +
			'<td> Total: &#8369;' + total.toFixed(2) +'</td></tr>'
		)


</script>

			</table>
		</div>



    <script type="text/javascript">
      window.print();
      onafterprint = function () {
				sessionStorage.clear();
                 window.location.replace('/pos');
           }

    </script>

  </body>
</html>
