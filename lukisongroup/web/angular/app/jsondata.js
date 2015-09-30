var app = angular.module("jsondata",[]);
app.controller("AppCtrl",function($scope,$http,$rootScope){

	
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
			var objOnerow = [objAllrow[16]];   											//get row value --ptr.nov--
			var objOnerowcolumn = JSON.parse([objAllrow[16].Val_Json])[0];   							//get row value --ptr.nov--
			var objOnerowcolumn_jsondataclm = JSON.parse([objAllrow[16].Val_Json]);   	//get row value --ptr.nov--
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


	//$scope.chartHourly_transaksi = function (){
		//window.function ($scope, $rootScope){
		$scope.attrs = {
			"caption": "Hourly Transaction",
			"numberprefix": "$",
			"plotgradientcolor": "",
			"bgcolor": "FFFFFF",
			"showalternatehgridcolor": "0",
			"divlinecolor": "CCCCCC",
			"showvalues": "0",
			"showcanvasborder": "0",
			"canvasborderalpha": "0",
			"canvasbordercolor": "CCCCCC",
			"canvasborderthickness": "1",
			"yaxismaxvalue": "30000",
			"captionpadding": "30",
			"linethickness": "3",
			"yaxisvaluespadding": "15",
			"legendshadow": "0",
			"legendborderalpha": "0",
			"palettecolors": "#008ee4,#33bdda,#e44a00,#6baa01,#583e78",
			"showborder": "0"
		};
		$scope.categories = [
			{
				"category": [
					{
						"label": "10"
					},
					{
						"label": "12"
					},
					{
						"label": "14"
					},
					{
						"label": "16"
					},
					{
						"label": "18"
					},
					{
						"label": "20"
					},
					{
						"label": "22"
					},
				]
			}
		];
		
		$scope.dataset = [
			{
				"seriesname": "2013",
				"data": [
					{
						"value1": "25400"
					},
					{
						"value": "24800"
					},
					{
						"value": "21800"
					},
					{
						"value": "21800"
					},
					{
						"value": "24600"
					},
					{
						"value": "27600"
					},
					{
						"value": "26800"
					},
					{
						"value": "27700"
					},
					{
						"value": "23700"
					},
					{
						"value": "25900"
					},
					{
						"value": "26800"
					},
					{
						"value": "24800"
					}
				]
			},
			{
				"seriesname": "2012",
				"data": [
					{
						"value": "10000"
					},
					{
						"value": "11500"
					},
					{
						"value": "12500"
					},
					{
						"value": "15000"
					},
					{
						"value": "16000"
					},
					{
						"value": "17600"
					},
					{
						"value": "18800"
					},
					{
						"value": "19700"
					},
					{
						"value": "21700"
					},
					{
						"value": "21900"
					},
					{
						"value": "22900"
					},
					{
						"value": "20800"
					}
				]
			},
			{
				"seriesname": "2011",
				"data": [
					{
						"value": "10000"
					},
					{
						"value": "11500"
					},
					{
						"value": "12500"
					},
					{
						"value": "15000"
					},
					{
						"value": "16000"
					},
					{
						"value": "17600"
					},
					{
						"value": "18800"
					},
					{
						"value": "1222"
					},
					{
						"value": "21700"
					},
					{
						"value": "21900"
					},
					{
						"value": "22900"
					},
					{
						"value": "20800"
					}
				]
			}
		];
		
	//}
		// $scope.chartHourly_transaksi();	 
});

