(function() {
  'use strict';
  angular.module('app.controllers', [])
  .controller('AppCtrl', ['$scope', '$filter','dataServise', function($scope, $filter, dbServise) {

        var $promise = dbServise.getData($scope);

        $promise.then(function(msg) { 
            if (msg.data != undefined) {
      		$scope.animals = msg.data;
      		$scope.sum = {};
                $scope.mean = {};
                $scope.max = {};
                $scope.min = {};
                var sumGoat = 0;
                var sumSheep = 0;

                for (var i = 0; i < $scope.animals.goat.length; i++) {
                        sumGoat += $scope.animals.goat[i];
                        sumSheep += $scope.animals.sheep[i];
                }
                $scope.max.goat = Math.max.apply(Math,$scope.animals.goat); 
                $scope.min.goat = Math.min.apply(Math,$scope.animals.goat);
                $scope.max.sheep = Math.max.apply(Math,$scope.animals.sheep); 
                $scope.min.sheep = Math.min.apply(Math,$scope.animals.sheep);
                
                $scope.sum.goat = sumGoat;
                $scope.mean.goat = sumGoat/100;
                $scope.sum.sheep = sumSheep;
                $scope.mean.sheep = sumSheep/100;
                
            } else {
                alert ('no Data');
            }
     	});	
    }

  ]);

}).call(this);

//# sourceMappingURL=main.js.map
