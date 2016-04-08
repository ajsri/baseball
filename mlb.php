<!doctype html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <style>
    </style>
  </head>
  <body ng-app="MLBApp">
    <div ng-controller="ScoreController">
      <div>
        <div data-ng-repeat="game in games">
          <p>{{game.away_team_city}} at {{game.home_team_city}} {{game.home_time}}{{game.home_time_zone}}</p>
        </div>
      {{scoreboard.copyright}}
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="./common/angular.js"></script>
  <script>
    var mlbApp = angular.module('MLBApp', []);

    mlbApp.controller('ScoreController', function($scope, $http){
      //TODO - format a date and get current day's schedule
      //right now just hard code it
      $scope.baseURL = 'http://gd2.mlb.com/components/game/mlb/year_2016/month_'
      $scope.date = '04/day_08/master_scoreboard.json';
      $http.get($scope.baseURL + $scope.date)
        .then(function(response){
          $scope.scoreboard = response.data;
          $scope.games = response.data.data.games.game;
          console.log($scope.games);
        });
    });

  </script>
</html>