<?php
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "	<head>\n";
echo "		<meta charset=\"utf-8\">\n";
echo "		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
echo "		\n";
echo "		<title>CCU Parking App</title>\n";
echo "		\n";
echo "		<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>	<!-- Latest complied JQuery -->\n";
echo "		<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>	<!-- Latest compiled JavaScript -->		\n";
echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/bsCSS.css\">		\n";
echo "		<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">\n";
echo "	</head>\n";

echo "	<body>\n";
echo "		<div class=\"container-fluid\">\n";
echo "			<div class=\"page-header\">\n";
echo "				<div class=\"jumbotron\">\n";
echo "					<h1>CCU Parking App</h1>\n";
echo "				</div>\n";
echo "			</div>\n";
echo "		</div>\n";

echo "		<div id=\"map\" class=\"container\">\n";
echo "				<div class=\"media\">\n";
echo "						<!-- <img src=\"img/parking_map.png\" class=\"media-object center-block\" style=\"width:700px\"> -->\n";
echo "				</div>\n";
echo "			</div>\n";
echo "		</div>\n";

echo "		<div id=\"btnBody\" class=\"container\">\n";
echo "			<div class=\"row\">\n";
echo "				<div class=\"col-md-4 col-xs-1\"></div>\n";
echo "				<div id=\"legend\" class=\"col-md-4 col-xs-10\"></div>	\n";
echo "				<div class=\"col-md-4 col-xs-1\"></div>\n";
echo "			</div>\n";

echo "			<div class=\"row\">\n";
echo "				<div class=\"btn-group\">\n";
echo "					<select id=\"startLot\" class=\"btn btn-primary btn-lg col-xs-3\">\n";
echo "						<option value=\"lotG\">Lot G</option>\n";
echo "						<option value=\"lotM\" >Lot M</option>\n";
echo "						<option value=\"lotAA\" >Lot AA</option>\n";
echo "						<option value=\"lotBB\" >Lot BB</option>\n";
echo "						<option value=\"lotDD\" >Lot DD</option>\n";
echo "						<option value=\"lotEE\" >Lot EE</option>\n";
echo "						<option value=\"lotGG\" >Lot GG</option>\n";
echo "						<option value=\"lotHH\" >Lot HH</option>\n";
echo "						<option value=\"lotKK\" >Lot KK</option>\n";
echo "						<option value=\"lotNN\" >Lot NN</option>\n";
echo "						<option value=\"lotQQ\" >Lot QQ</option>\n";
echo "						<option value=\"lotYY\" >Lot YY</option>\n";
echo "						<option value=\"lotDDD\" >Lot DDD</option>\n";
echo "					</select>	\n";

echo "					<select id=\"destinationLot\" class=\"btn btn-primary btn-lg col-xs-3\">\n";
echo "						<option value=\"lotG\">Lot G</option>\n";
echo "						<option value=\"lotM\" >Lot M</option>\n";
echo "						<option value=\"lotAA\" >Lot AA</option>\n";
echo "						<option value=\"lotBB\" >Lot BB</option>\n";
echo "						<option value=\"lotDD\" >Lot DD</option>\n";
echo "						<option value=\"lotEE\" >Lot EE</option>\n";
echo "						<option value=\"lotGG\" >Lot GG</option>\n";
echo "						<option value=\"lotHH\" >Lot HH</option>\n";
echo "						<option value=\"lotKK\" >Lot KK</option>\n";
echo "						<option value=\"lotNN\" >Lot NN</option>\n";
echo "						<option value=\"lotQQ\" >Lot QQ</option>\n";
echo "						<option value=\"lotYY\" >Lot YY</option>\n";
echo "						<option value=\"lotDDD\" >Lot DDD</option>\n";
echo "					</select>\n";

echo "					<select id=\"mode\" class=\"btn btn-primary btn-lg col-xs-3\">\n";
echo "						<option value=\"DRIVING\">Driving</option>\n";
echo "						<option value=\"WALKING\">Walking</option>\n";
echo "					</select>	\n";

echo "					<button type=\"button\" class=\"btn btn-primary btn-lg col-xs-3\" id=\"getDirections\">Get Directions</button>					\n";

echo "				</div>\n";

echo "				</div>\n";

echo "				<div class=\"row\">\n";

echo "					<button type=\"button\" class=\"btn btn-primary btn-lg col-md-6 col-xs-6\" id=\"chkLots\">Check Lots</button>\n";

echo "					<div class=\"dropup\">\n";
echo "						<button type=\"button\" class=\"btn btn-primary btn-lg dropdown-toggle col-md-6 col-xs-6\" data-toggle=\"dropdown\">Lots</button>\n";
echo "							<ul class=\"dropdown-menu dropdown-menu-right\">\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotAA\">Lot AA</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotBB\">Lot BB</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotDD\">Lot DD</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotDDD\">Lot DDD</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotEE\">Lot EE</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotG\">Lot G</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotGG\">Lot GG</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotHH\">Lot HH</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotKK\">Lot KK</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotM\">Lot M</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotNN\">Lot NN</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotQQ\">Lot QQ</a></li>\n";
echo "								<li><a data-toggle=\"modal\" href=\"#chkLotYY\">Lot YY</a></li>\n";
echo "							</ul>\n";
echo "					</div>\n";

echo "				</div>\n";
echo "			<div class=\"modal fade\" id=\"chkLotsMod\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4><span class=\"glyphicon glyphicons-car\"></span>Lots Available</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what Lots are available.</p>\n";							

echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";

echo "			<div class=\"modal fade\" id=\"chkLotAA\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot AA</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotBB\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot BB</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotDD\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot DD</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";
echo "			<div class=\"modal fade\" id=\"chkLotDDD\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot DDD</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";

echo "			<div class=\"modal fade\" id=\"chkLotEE\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot EE</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotG\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot G</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotGG\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot GG</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotHH\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot HH</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotKK\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";
echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot KK</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotM\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot M</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";
echo "			<div class=\"modal fade\" id=\"chkLotNN\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot NN</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotQQ\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot QQ</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";


echo "			<div class=\"modal fade\" id=\"chkLotYY\" role=\"dialog\">\n";
echo "				<div class=\"modal-dialog\">\n";

echo "				<!-- Modal content-->\n";
echo "					<div class=\"modal-content\">\n";
echo "						<div class=\"modal-header\">\n";
echo "							<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\n";
echo "							<h4>Lot YY</h4>\n";
echo "						</div>\n";
echo "						<div class=\"modal-body\">\n";
echo "							<p>This is where we will display what spots are available.</p>\n";
echo "						</div>\n";
echo "						<div class=\"modal-footer\">\n";
echo "							<button type=\"submit\" class=\"btn btn-danger btn-default pull-left\" data-dismiss=\"modal\"><span class=\"glyphicon glyphicon-remove\"></span> Cancel</button>\n";
echo "						</div>\n";
echo "					</div>\n";
echo "				</div>\n";
echo "			</div>\n";
echo "			\n";
echo "		</div>\n";

echo "		<div class=\"navbar navbar-default navbar-fixed-bottom\">\n";
echo "			<div class=\"container-fluid\">\n";
echo "				<img src=\"img/cculogo.png\" class=\"media-object\" style=\"width:180px\">\n";
echo "			</div>\n";
echo "		</div>\n";

echo "	<script>\n";
echo "		$(document).ready(function(){\n";
echo "			$(\"#chkLots\").click(function(){\n";
echo "				$(\"#chkLotsMod\").modal();\n";
echo "			});\n";
echo "		});\n";
echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotAA\").modal();\n";
echo "			});\n";
echo "		});\n";
echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotBB\").modal();\n";
echo "			});\n";
echo "		});\n";
echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotDD\").modal();\n";
echo "			});\n";
echo "		});\n";

echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotDDD\").modal();\n";
echo "			});\n";
echo "		});\n";

echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotEE\").modal();\n";
echo "			});\n";
echo "		});\n";

echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotG\").modal();\n";
echo "			});\n";
echo "		});\n";

echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotGG\").modal();\n";
echo "			});\n";
echo "		});\n";
echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotHH\").modal();\n";
echo "			});\n";
echo "		});\n";

echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotKK\").modal();\n";
echo "			});\n";
echo "		});\n";

echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotM\").modal();\n";
echo "			});\n";
echo "		});\n";

echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotNN\").modal();\n";
echo "			});\n";
echo "		});\n";
echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotQQ\").modal();\n";
echo "			});\n";
echo "		});\n";
echo "		$(document).ready(function(){\n";
echo "			$(\"\").click(function(){\n";
echo "				$(\"#chkLotYY\").modal();\n";
echo "			});\n";
echo "		});\n";
echo "	</script>\n";

echo "	<script async defer src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyB4b2c3kE37JJGLh8-pVaHZYDIEmdTeWKc&callback=initMap\"></script>\n";

echo "	<script src=\"map.js\"></script>\n";

echo "	</body>\n";
echo "</html>\n";
?>