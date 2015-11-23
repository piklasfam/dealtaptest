(function() {
  'use strict';
 var app = angular.module('app', ['app.controllers']);
 //service to connect to php file and recive data on json format
 app.factory('dataServise',function($http){ 
	return {
		getData:function(data){  
			return $http.post('getAnimalData.php',data);
		}
	}
});
}).call(this);

