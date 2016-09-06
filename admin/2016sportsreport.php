<!DOCTYPE html>
<html >
<link rel="stylesheet" type="text/css" href="custom.css">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="app.js"></script>
<body>
 
<div ng-app="myApp" ng-controller="customersCtrl" class="inRow">
    <div style='float:left; padding-right:5px'>
    <table>
      <thead>
      <tr>
          <th ng-repeat="x in rowHeader[report]">{{x}}</th>
      </tr>
      </thead>
      <tbody>
      <tr ng-repeat="row in rows | orderBy:'4'">
        <td>{{ $index + 1 }}</td>
        <td ng-repeat="prop in row">{{prop}}</td>
      </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="7">Total</td>
          <td>{{ total | currency}}</td>
          <td></td>
        </tr>
      </tfoot>
    </table>
    </div>
    <div style='float:right'>
        <table>
          <thead><tr><th ng-repeat="x in rowHeader['Fee Receipt']">{{x}}</th></tr></thead>
          <tbody>
            <tr ng-repeat="(key, value) in payments">
              <td>{{ $index + 1 }}</td>
              <td>{{key}}</td>
              <td>{{value | currency}}</td>
            </tr>
          </tbody>
          <tfoot><tr><td colspan="2">Total</td><td>{{ total | currency}}</td></tr></tfoot>
        </table><br>
        <table>
          <thead><tr><th ng-repeat="x in rowHeader['Event tally']">{{x}}</th></tr></thead>
          <tbody>
            <tr ng-repeat="(key, value) in events">
              <td>{{ $index + 1 }}</td>
              <td>{{key}}</td>
              <td>{{value}}</td>
            </tr>
          </tbody>
        </table>
    </div> 
</div>
</body>
</html>

