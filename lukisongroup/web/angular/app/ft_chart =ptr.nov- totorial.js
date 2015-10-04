var app = angular.module("ft_chart",[]); app.controller("AppCtrl",function($scope,$http){ 

 //$scope.pilih = {1};
// aksi mendapatkan semua data pelanggan 
$scope.dapatkanChartsss = function(){ 
	$http({
			url: "http://localhost/api/api/web/sss/charts",
			method: "GET",
			//params: {id=1}
			//headers: { 'access-token': 'azLSTAYr7Y7TLsEAML-LsVq9cAXLyAWa' }
			//params: {access-token:azLSTAYr7Y7TLsEAML-LsVq9cAXLyAWa}
		}
	).success(function(data){ 
	
		

		//$scope.semuaChartsss =data.chartsss;
		var objAllrow = data.chartsss;	  											//get All row   --ptr.nov--
		var objOnerow = [objAllrow[7]];   											//get row value --ptr.nov--
		var objOnerowcolumn = [objAllrow[7].Val_Json];   							//get row value --ptr.nov--
		var objOnerowcolumn_jsondataclm = JSON.parse([objAllrow[7].Val_Json]);   	//get row value --ptr.nov--
		var objOnerowcolumn_jsondataclm_Onerow = [(JSON.parse([objAllrow[7].Val_Json]))[1]];   	//get row value --ptr.nov--
		
		//api data with Serialz  object
		$scope.semuaChartsss  =objOnerow;
		$scope.semuaChartsss1 =objOnerowcolumn;
		$scope.semuaChartsss2 =objOnerowcolumn_jsondataclm;
		$scope.semuaChartsss3 =objOnerowcolumn_jsondataclm_Onerow;
		
		/*
		//Non api data with Serialz  object
		$scope.semuaChartsss  = data; 
		$scope.semuaChartsss1 = [data[7].Val_Json];
		$scope.semuaChartsss2 =  JSON.parse([data[7].Val_Json]);
		$scope.semuaChartsss3 = [(JSON.parse([data[7].Val_Json]))[1]];
		*/
		
		//var obj = jQuery.parseJSON(data);
                  //  alert(angular.isArray(obj));			
				//console.log(obj.province);
				//$.each( data, function(index) {			
						//alert( data[index].Val_Nm);
				   // alert(data[index].Val_Nm);
			  //});
			//  $.each( data.Vaj_Json, function(index) {			
						//alert( data[index].Val_Nm);
				//    alert(data.Vaj_Json[index]);
			  //});
			  //alert( data[0].Val_Nm);
              // $filter('json')(obj, spacing);
		//angular.forEach($scope.chartsss.Val_Json, function(value, key){
		//	 if(value.Password == "thomasTheKing")
		////	   console.log("username is thomas");
		//	 });
		}); 
	};
	
	
	//Datatkan semua saat run program
	 $scope.dapatkanChartsss();
	 
	 
	 
	 
	 
	 
	 
	 
});