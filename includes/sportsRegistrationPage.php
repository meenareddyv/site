<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../js/sports.js"></script>
<link href="../css/form-styles.css" rel="stylesheet">

<div id="envelope">
	<div id="sports-registration" ng-app="sportsApp" ng-controller="sportsCtrl">
		<div class="contact_form">
			<ul ng-show="!(bShowPayment || bDisplayError)">
				<h3>2016 Sports Registration</h3> (Already registered? click <a href="sportsRegistrationInfo.php">here</a> to view details)
				<li>
				    <label>Team Registration For:</label>
				    <select ng-model="paramTO.game" ng-change="changeGame()" ng-options="x for x in events"></select>
			    	<a ng-show="paramTO.game==='Throwball'" href="..\images\TTA_ThrowBall_Rules_2016.pdf">Rules</a>
				</li>
				<div ng-show="paramTO.game==='Tennis'">
					<li>
					    <label>Age Group:</label>
					    <select ng-model="paramTO.gameType" ng-options="x for x in ['Senior', 'Junior']"></select>
					</li>
					<li ng-show="paramTO.gameType==='Junior'">
						Note - All participants in the group are expected to be aged 17 or below.
					</li>
				</div>
				<li>
				    <label>Team Name (Optional):</label>
				    <input type="text" style="width:400px" ng-model="paramTO.team_name" placeholder="Team Name" />
				</li>
				<li>
				    <label>Captain:</label>
				    <input type="text" ng-change="displayError=false" ng-model="paramTO.captain" placeholder="Enter Name" required />
				</li>
				<li>
				    <label>Contact Number:</label>
				    <input type="text"  ng-change="displayError=false" ng-model="paramTO.phone" placeholder="Captain's cell number" required />
				</li>
				<li>
				    <label>Email Id:</label>
				    <input type="text" ng-change="displayError=false" ng-model="paramTO.email" placeholder="Captain's email id" required />
				</li>
				<li>
				    <label>Additional Player Info:</label><br>
				</li>
				<li ng-show="numPlayers>1">
				    <label>Player - 1:</label>
				    <input type="text"  ng-model='paramTO.player1' placeholder="Player 1" />
				</li>
				<li ng-show="numPlayers>2">
				    <label>Player - 2:</label>
				    <input type="text"  ng-model='paramTO.player2' placeholder="Player 2" />
				</li>
				<li ng-show="numPlayers>3">
				    <label>Player - 3:</label>
				    <input type="text"  ng-model='paramTO.player3' placeholder="Player 3" />
				</li>
				<li ng-show="numPlayers>4">
				    <label>Player - 4:</label>
				    <input type="text"  ng-model='paramTO.player4' placeholder="Player 4" />
				</li>
				<li ng-show="numPlayers>5">
				    <label>Player - 5:</label>
				    <input type="text"  ng-model='paramTO.player5' placeholder="Player 5" />
				</li>
				<li ng-show="numPlayers>6">
				    <label>Player - 6:</label>
				    <input type="text"  ng-model='paramTO.player6' placeholder="Player 6" />
				</li>
				<li ng-show="numPlayers>7">
				    <label>Player - 7:</label>
				    <input type="text"  ng-model='paramTO.player7' placeholder="Player 7" />
				</li>
				<li>
				    <label>Registration Fee:</label>{{paramTO.registrationFee | currency}}
				</li>
				<li>
				<div style="width:90%" class="alert alert-warning" ng-show="displayError">
					<strong>Note! </strong>{{errorMessage}}
				</div>
				</li>
				
		        <li>
		        	<button name="submit" class="btnAction" ng-click="submitRegistration()">Register and Pay</button>
		        </li>
		    </ul>
		
			<div ng-show="bShowPayment">
				<ul>
					<li>
                                            <div style="width:90%" class="alert alert-info">
                                                {{regMessage}}
                                            </div>
					</li>
					<li>
						<label>Registration ID:</label>
						<span>{{paramTO.reg_num}}</span>
					</li><br>
					<li ng-show="paramTO.team_name">
					    <label>Team Name:</label>
					    <span>{{paramTO.team_name}}</span>
					</li><br>
					<li>
					    <label>Captain:</label><span>{{paramTO.captain}}</span>
					</li><br>
					<li>
					    <label>Participating Game:</label>{{paramTO.game}}
					</li><br>
					<li ng-hide="paid">
					    <label>Fee:</label>{{paramTO.registrationFee | currency}}
					</li><br>
					<li ng-show="paid">
					    Registration fee paid up!
					</li><br>
				</ul>
				<div ng-hide="paid">
				<!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">  -->
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_xclick" />
					<input type="hidden" name="business" value="bizindia5to5@gmail.com"  />
					<input type="hidden" name="amount" value="{{paramTO.fee}}" />
					<input type="hidden" name="no_note" value="1" />
					<input type="hidden" name="lc" value="USA" />
					<input type="hidden" name="currency_code" value="USD" />
					<input type="hidden" name="item_name" value="TTA Sports Event">
					<input type="hidden" name="first_name" value="{{paramTO.captain}}" />
					<input type="hidden" name="last_name" value=""  />
					<input type="hidden" name="payer_email" value="{{paramTO.email}}" />
					<input type="hidden" name="receiver_email" value="info@troytelugu.org"  />
					<input type="hidden" name="item_number" value="{{reg_num}}" />
					<input type="hidden" name="currency_code" value="USD">
					<input type="hidden" name="return" value="http://troytelugu.org/root/site/pages/sportsRegistration_success.php">
					<input type="hidden" name="cancel_return" value="http://troytelugu.org/root/site/pages/sportsRegistration_error.php">
					<input type="hidden" name="notify_url" value="http://troytelugu.org/root/site/pages/sports_registration_form.php">
					<input style="height:50px;margin-left:156px" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="2">
				</form>
				</div>
				<ul><li>
					In case you need to modify any information, please contact us at info@troytelugu.org or <br>
					respective event coordinators.
				</li></ul>
			</div>
			<div ng-show="bDisplayError">
				<ul>
					<li>
					    <label>Error while registering!!</label>
					</li>
					<li>
						<label>Please re-visit the site to register, or <a href="contact.php">contact</a> us help complete the transaction offline.</label>
					</li>
				</ul>
			</div>
	    </div>
	</div>
</div>
