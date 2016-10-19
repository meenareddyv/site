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
                <div style="width:90%" class="alert alert-warning" ng-show="displayError">
                        <strong>Note! </strong>{{errorMessage}}
                </div>
                <h3>2016 Sports Registration Information</h3>
                <li>
                    <label>Registration Number:</label>
                    <input type="text"  ng-change="displayError=false" ng-model="paramTO.reg_num" required />
                </li>
                <li>
                    <label>Email Id:</label>
                    <input type="text" ng-change="displayError=false" ng-model="paramTO.email" placeholder="Captain's email id" required />
                </li>
                <li>
                    <button name="submit" class="btnAction" ng-click="retriveRegistration()">Retrieve Info</button>
                </li>
            </ul>
			<div ng-show="bShowPayment">
                            <ul>
                                <li>
                                    <label>Registration ID:</label><span>{{paramTO.reg_num}}</span>
                                </li><br>
                                <li ng-show="paramTO.team_name">
                                    <label>Team Name:</label><span>{{paramTO.team_name}}</span>
                                </li>
                                <li>
                                    <label>Captain:</label><span>{{paramTO.captain}}</span>
                                </li>
                                <li>
                                    <label>Contact #:</label><span>{{paramTO.phone}}</span>
                                </li>
                                <li>
                                    <label>Participating Game:</label>{{paramTO.game}}<span ng-show="paramTO.game==='Tennis'"> ({{paramTO.age_group}})</span>
                                </li>
                                <li><label>Other Participant(s) :</label>{{paramTO.player1}}
                                    <span ng-show="paramTO.game!='Tennis'">
                                        , {{paramTO.player2}}, {{paramTO.player3}},<br> {{paramTO.player4}}
                                        , {{paramTO.player5}}, {{paramTO.player6}},<br> {{paramTO.player7}}
                                    </span>
                                </li>
                                <li ng-hide="paid">
                                    <label>Fee:</label>{{paramTO.fee | currency}} (Yet to be paid!)
                                </li><br>
                                <li ng-show="paid">
                                    Registration fee paid up!
                                </li>
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
					<input type="hidden" name="item_number" value="{{paramTO.reg_num}}" />
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
                                    <label>Error while retrieving info!!</label>
                                </li>
                                <li>
                                    <label>Please check Registration ID or Email provided</label>
                                </li>
                            </ul>
			</div>
	    </div>
	</div>
</div>
