<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>{{$title}}</title>

		<style>
			.invoice-box {
                width: 100%;
				/* max-width: 800px;
				margin: auto; */
				/* padding: 10px; */
				/* border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				/* color: #555; */
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
				background: #70b0e4;
                text-align: center;
                padding-bottom: 10px;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
                text-align: center;
                border-bottom: 1px solid #eee;
				padding-bottom: 20px;
			}
            .invoice-box table tr.details.odd {
                background-color: #eee;
            }

			.invoice-box table tr.item td {
                text-align: center;
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
				text-align: center;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: center;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="6">
						<table>
							<tr>
                                <img
                                    src="{{public_path('images/logo-jbg.png') }}"
                                    style="width: 100%; max-width: 200px;  margin-bottom: 20px;"
                                />

								<td>
									<div style="font-size: 24px; color: black; margin-bottom: 10px;">
                                        {{$title}}
                                    </div>
									{{$from}} - {{$to}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td>
									PT Jorong Barutama Greston (JBG)<br />
									Desa Swarangan, Kecamatan Jorong,<br /> Kabupaten Tanah Laut, Kalimantan Selatan.<br />
								</td>

								<!-- <td>
									Acme Corp.<br />
									John Doe<br />
									john@example.com
								</td> -->
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td >No</td>
                    <td >Tanggal</td>
                    <td >Nama Barang</td>
                    <td >Lokasi Barang</td>
                    <td >Label Barang</td>
                    <td >Jumlah Masuk</td>

				</tr>

                @foreach($barang as $key => $item)
				<tr  class="details {{ $key % 2 != 0 ? 'odd' : '' }}">
					<td>{{ $key + 1 }}</td>
                    <td>{{ Carbon::parse($item->tanggal)->format('d M Y') }}</td>
					<td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->barang->lokasi_barang }}</td>
                    <td >{{ $item->barang->label_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
				</tr>
                @endforeach

				<!-- <tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>Website design</td>

					<td>$300.00</td>
				</tr>

				<tr class="item">
					<td>Hosting (3 months)</td>

					<td>$75.00</td>
				</tr>

				<tr class="item last">
					<td>Domain name (1 year)</td>

					<td>$10.00</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: $385.00</td>
				</tr> -->
			</table>
		</div>
	</body>
</html>
