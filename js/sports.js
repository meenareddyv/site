var app = angular.module('sportsApp', [])

.controller('sportsCtrl', function($scope, $http, $location) {
	$scope.events = [ "Volleyball", "Throwball", "Tennis"];
	$scope.paramTO = {};
	$scope.paramTO.game = "Volleyball";
	$scope.paramTO.gameType = "Senior";
	$scope.numPlayers = 8;
	$scope.paramTO.registrationFee = 80.00;
	$scope.bShowPayment = false;
	$scope.bDisplayError = false;
	$scope.regId = 0;
	$scope.paramTO.team_name = "";
	$scope.paramTO.captain = "";
	$scope.paramTO.phone = "";
	$scope.paramTO.email = "";
	$scope.paramTO.reg_num = "";
	$scope.paramTO.player1 = "";
	$scope.paramTO.player2 = "";
	$scope.paramTO.player3 = "";
	$scope.paramTO.player4 = "";
	$scope.paramTO.player5 = "";
	$scope.paramTO.player6 = "";
	$scope.paramTO.player7 = "";
	$scope.regMessage = "Successfully Registered !!";
	$scope.paid = false;
        
	$scope.changeGame = function() {
		if ( $scope.paramTO.game === "Tennis" ) {
			$scope.numPlayers = 2;
			$scope.paramTO.registrationFee = 10;
		}  else {
			$scope.numPlayers = 8;
			if ( $scope.paramTO.game === "Throwball" )
				$scope.paramTO.registrationFee = 30;
			else // Vollyball
				$scope.paramTO.registrationFee = 80;
		}
	};
	
        $scope.retriveRegistration = function() {
            if ( Number($scope.paramTO.reg_num) <= 0 || $scope.paramTO.email.length === 0 ) {
                $scope.displayError = true;
                $scope.errorMessage = "Please provide valid Registration # and Email";
                return;
            }

            $http.post("sports_registration_form.php", $scope.paramTO)
        	.success(function (data) {
                    if ( data.type === "exists" ) {
                        $scope.bShowPayment = true;
                        $scope.paid = !( data.row.paid_status === "not paid" );
                        $scope.paramTO = data.row;
                    } else {
                        $scope.displayError = true;
                        $scope.errorMessage = "Registration # with Email provided is not registered";
                    }
        	})
        	.error(function () {
        		$scope.bDisplayError = true;
        	});
        };
        
	$scope.submitRegistration = function() {
		if ( $scope.paramTO.captain.length === 0 || $scope.paramTO.phone.length === 0 
				|| $scope.paramTO.email.length === 0 ) {
			$scope.displayError = true;
			$scope.errorMessage = "Please provide valid Captain Name, Phone and Email";
			return;
		}
		
		$http.post("sports_registration_form.php", $scope.paramTO)
        	.success(function (data, response, header) {
        		$scope.bShowPayment = true;
        		$scope.regId = data.regId;
        		if ( data.type === "exists" ) {
                            $scope.regMessage = "User Already Registered !";
                            $scope.paid = !( data.row.paid_status === "not paid" );
                            $scope.paramTO = data.row;
        		}
        	})
        	.error(function (data, status, headers, config) {
        		$scope.bDisplayError = true;
        	});
	}
});

