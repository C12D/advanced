var app = angular.module("App1",[]); app.controller("AppCtrl",function($scope,$http){ 


// aksi mendapatkan semua data pelanggan 
$scope.dapatkanPelanggan = function(){ 
	$http.get(
		'http://ptrnov-api.dev/gsn/kotas'
	).success(function(data){ 
		$scope.semuaPelanggan = data.Kota; 
		
		//var fixedResponse = response.responseText.replace(/\\'/g, "'");
	//	var jsonObj = JSON.parse(fixedResponse);
		//var obj = data;
	//	document.write(jsonObj.province_id + ", " + jsonObj.province_id);
		//$scope.semuaPelanggan = jsonObj.province_id ; 
		// $scope.dapatkanPelanggan = obj[0].province;
		//var obj = jQuery.parseJSON(data);
                  //  alert(angular.isArray(obj));			
				//console.log(obj.province);
				//$.each(data, function(index) {
				   //alert(data[index].province_id);
					//alert(data[index].province);
				//});
              // $filter('json')(obj, spacing);
		}); 
	};
	 $scope.dapatkanPelanggan();
});