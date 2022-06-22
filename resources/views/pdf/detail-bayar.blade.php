<!DOCTYPE html>
<html>
<head>
	<title>Detail Pembayaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2>Detail Pembayaran</h2>
    <h5>invoice : {{$data_bayar->inv_id}}</h5>
    <hr>
	<table class='table table-borderless'>
		<thead>
			<tr>
				<th>Produk</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>
            <tr>
                <td>Paket {{$data_bayar->method}}</td>
                <td>Rp {{$data_bayar->price}}</td>
            </tr>
            <tr>
                <td>Biaya Layanan</td>
                <td>Rp {{$data_bayar->admin_fee}}</td>
            </tr>
            <tr class="border-top">
                <td>Total Biaya</td>
                <td>Rp {{$data_bayar->price+$data_bayar->admin_fee}}</td>
            </tr>
		</tbody>
	</table>

</body>
</html>