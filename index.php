<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="row w-100 m-0 p-0">
		<div class="col-lg-12 p-0 m-0">
		<h1 class="w-100">Create Market Heursitic Set</h1>
			<form action="./php/create_market.php" method="get">
				<table class="table">
					<thead>
						<tr>	
							<th>Market</th>
							<th>Compact Car</th>
							<th>Standard Car</th>
							<th>Trucks</th>
							<th>Luxury</th>
							<th>Known for Safety</th>
							<th>Reasonable Cost</th>
							<th>Readily Available</th>
							<th>Linked to Competition</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<select class="form-control" name="ind_id">
									<option value="Local Deliveries">Local Deliveries</option>
									<option value="Professional Drivers / Trucking">Professional Drivers / Trucking</option>
									<option value="Ride Hailing">Ride Hailing</option>
									<option value="Rescue / Emergency Services">Rescue / Emergency Services</option>
								</select>
							</td>
							<td>
								<input type="text" class="form-control" name="cmpct">
							</td>
							<td>
								<input type="text" class="form-control" name="std">
							</td>
							<td>
								<input type="text" class="form-control" name="trk">
							</td>
							<td>
								<input type="text" class="form-control" name="lxry">
							</td>
							<td>
								<input type="text" class="form-control" name="safe">
							</td>
							<td>
								<input type="text" class="form-control" name="cost">
							</td>
							<td>
								<input type="text" class="form-control" name="rdy">
							</td>
							<td>
								<input type="text" class="form-control" name="link">
							</td>
						</tr>
					</tbody>
				</table>
				<button type="submit" class="btn btn-primary">Create</button>
			</form>
		</div>
	</div>
	<div class="row w-100 m-0 p-0">
		<div class="col-lg-12 p-0 m-0">
			<?php require './php/calc_heuristics.php' ?>
		</div>
	</div>
</body>