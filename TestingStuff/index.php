<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>CCU Parking App</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	<!-- Latest complied JQuery -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	<!-- Latest compiled JavaScript -->		
		<link rel="stylesheet" type="text/css" href="css/bsCSS.css">		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	
	<body>

		<div class="container-fluid">
			<div class="page-header">
				<div class="jumbotron">
					<h1>CCU Parking App</h1>	
				</div>
			</div>
		</div>
		
		<div id="map" class="container">
				
				<div class="media">
						<!-- <img src="img/parking_map.png" class="media-object center-block" style="width:700px"> -->
				</div>
			
			</div>
		</div>
		

		
		<div id="btnBody" class="container">
			
			<div class="row">
				<div class="col-md-4 col-xs-1"></div>
				<div id="legend" class="col-md-4 col-xs-10"></div>	
				<div class="col-md-4 col-xs-1"></div>
			</div>
			
				<div class="row">
			
				<div class="btn-group">
				
					<select id="startLot" class="btn btn-primary btn-lg col-xs-3">
						<option value="lotG">Lot G</option>
						<option value="lotM" >Lot M</option>
						<option value="lotAA" >Lot AA</option>
						<option value="lotBB" >Lot BB</option>
						<option value="lotDD" >Lot DD</option>
						<option value="lotEE" >Lot EE</option>
						<option value="lotGG" >Lot GG</option>
						<option value="lotHH" >Lot HH</option>
						<option value="lotKK" >Lot KK</option>
						<option value="lotNN" >Lot NN</option>
						<option value="lotQQ" >Lot QQ</option>
						<option value="lotYY" >Lot YY</option>
						<option value="lotDDD" >Lot DDD</option>
					</select>	
					
					<select id="destinationLot" class="btn btn-primary btn-lg col-xs-3">
						<option value="lotG">Lot G</option>
						<option value="lotM" >Lot M</option>
						<option value="lotAA" >Lot AA</option>
						<option value="lotBB" >Lot BB</option>
						<option value="lotDD" >Lot DD</option>
						<option value="lotEE" >Lot EE</option>
						<option value="lotGG" >Lot GG</option>
						<option value="lotHH" >Lot HH</option>
						<option value="lotKK" >Lot KK</option>
						<option value="lotNN" >Lot NN</option>
						<option value="lotQQ" >Lot QQ</option>
						<option value="lotYY" >Lot YY</option>
						<option value="lotDDD" >Lot DDD</option>
					</select>		
					
					<select id="mode" class="btn btn-primary btn-lg col-xs-3">
						<option value="DRIVING">Driving</option>
						<option value="WALKING">Walking</option>
					</select>	
					
					<button type="button" class="btn btn-primary btn-lg col-xs-3" id="getDirections">Get Directions</button>					
				
				</div>
				

				
				</div>
				
				<div class="row">
				
					<button type="button" class="btn btn-primary btn-lg col-md-6 col-xs-6" id="chkLots">Check Lots</button>		
					
					<div class="dropup">
						<button type="button" class="btn btn-primary btn-lg dropdown-toggle col-md-6 col-xs-6" data-toggle="dropdown">Lots</button>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a data-toggle="modal" href="#chkLotAA">Lot AA</a></li>
								<li><a data-toggle="modal" href="#chkLotBB">Lot BB</a></li>
								<li><a data-toggle="modal" href="#chkLotDD">Lot DD</a></li>
								<li><a data-toggle="modal" href="#chkLotDDD">Lot DDD</a></li>
								<li><a data-toggle="modal" href="#chkLotEE">Lot EE</a></li>
								<li><a data-toggle="modal" href="#chkLotG">Lot G</a></li>
								<li><a data-toggle="modal" href="#chkLotGG">Lot GG</a></li>
								<li><a data-toggle="modal" href="#chkLotHH">Lot HH</a></li>
								<li><a data-toggle="modal" href="#chkLotKK">Lot KK</a></li>
								<li><a data-toggle="modal" href="#chkLotM">Lot M</a></li>
								<li><a data-toggle="modal" href="#chkLotNN">Lot NN</a></li>
								<li><a data-toggle="modal" href="#chkLotQQ">Lot QQ</a></li>
								<li><a data-toggle="modal" href="#chkLotYY">Lot YY</a></li>
							</ul>
					</div>	
				
				</div>


			<div class="modal fade" id="chkLotsMod" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><span class="glyphicon glyphicons-car"></span>Lots Available</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what Lots are available.
							<?php
							
								echo "<table style='border: solid 1px black;'>";
								echo "<tr><th>Parking Lot Name</th><th>Vehicles Entered</th><th>Vehicles Exited</th><th>Number of General Spots</th><th>Number of Faculty/Staff Spots</th><th>Number of Faculty/Staff Spots</th><th>Number of Handicap Spots</th></tr><td>";
								
								class TableRows extends RecursiveIteratorIterator { 
									function __construct($it) { 
										parent::__construct($it, self::LEAVES_ONLY); 
									}
									
									function current() {
										return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
									}
								
									function beginChildren() { 
										echo "<tr>"; 
									} 
								
									function endChildren() { 
										echo "</tr>" . "\n";
									} 
								} 

							require_once("Connect.php");
								try {
									$sql = "SELECT name, vehiclesEntered, vehiclesExited, numGenSpots, numFacStaffSpots, numHandiSpots  FROM parkingLots";
									$stmt=$conn->prepare($sql);
									$stmt->execute();
									//$result=$stmt->fetchAll();
									
									// set the resulting array to associative
									$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
									foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k->$v) { 
										echo $v;
									}
		
								} catch(PDOException $e) {
									"ERROR: " . $e->getMessage();
								}
								$conn = null;
								echo "</table>";
								?>
								</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>

		
			<div class="modal fade" id="chkLotAA" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot AA</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>		
			
			
			<div class="modal fade" id="chkLotBB" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot BB</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>				
			
			
			<div class="modal fade" id="chkLotDD" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot DD</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>		


			<div class="modal fade" id="chkLotDDD" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot DDD</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>		

			
			<div class="modal fade" id="chkLotEE" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot EE</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>	
			
			
			<div class="modal fade" id="chkLotG" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot G</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>				
			
			
			<div class="modal fade" id="chkLotGG" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot GG</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>				
			
			
			<div class="modal fade" id="chkLotHH" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot HH</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>				
			
			
			<div class="modal fade" id="chkLotKK" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot KK</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>
			
			
			<div class="modal fade" id="chkLotM" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot M</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>		


			<div class="modal fade" id="chkLotNN" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot NN</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>				
			
			
			<div class="modal fade" id="chkLotQQ" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot QQ</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>				
			
			
			<div class="modal fade" id="chkLotYY" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Lot YY</h4>
						</div>
						<div class="modal-body">
							<p>This is where we will display what spots are available.</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>				
			
		</div>
		
		<div class="navbar navbar-default navbar-fixed-bottom">
			<div class="container-fluid">
				<img src="img/cculogo.png" class="media-object" style="width:180px">
			</div>
		</div>		
			
	<script>
		$(document).ready(function(){
			$("#chkLots").click(function(){
				$("#chkLotsMod").modal();
			});
		});

		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotAA").modal();
			});
		});		

		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotBB").modal();
			});
		});				

		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotDD").modal();
			});
		});				
		
		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotDDD").modal();
			});
		});				
		
		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotEE").modal();
			});
		});				
		
		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotG").modal();
			});
		});				
		
		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotGG").modal();
			});
		});		

		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotHH").modal();
			});
		});				
		
		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotKK").modal();
			});
		});		
		
		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotM").modal();
			});
		});				
		
		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotNN").modal();
			});
		});		

		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotQQ").modal();
			});
		});	

		$(document).ready(function(){
			$("").click(function(){
				$("#chkLotYY").modal();
			});
		});				
	</script>
	
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4b2c3kE37JJGLh8-pVaHZYDIEmdTeWKc&callback=initMap"></script>
	
	<script src="map.js"></script>
	
	</body>
</html>