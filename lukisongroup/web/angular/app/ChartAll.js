var app = angular.module("ChartAll",["ng-fusioncharts","chart.js"]);
app.controller("CtrlChart",function($scope,$http,$rootScope){

	
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


		//--Chart Type column2d -ptr.nov-
		$scope.attrs = {
			"caption": "Chart Type line Author : -ptr.nov- ",
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
			//"captionpadding": "30",
			//"linethickness": "3",
			"yaxisvaluespadding": "15",
			"legendshadow": "0",
			"legendborderalpha": "0",
			"palettecolors": "#008ee4,#33bdda,#e44a00,#6baa01,#583e78",
			"showborder": "1"
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
						"value": "25400"
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
		
		//--Chart Type column2d -ptr.nov-
		$scope.myDataSource = {
			chart: {
				caption: "Chart Type column2d Author : -ptr.nov-",
				subCaption: "Top 5 stores in last month by revenue",
				numberPrefix: "$",
				theme: "ocean"
			},
			data:[{
				label: "Bakersfield Central",
				value: "880000"
			},
			{
				label: "Garden Groove harbour",
				value: "730000"
			},
			{
				label: "Los Angeles Topanga",
				value: "590000"
			},
			{
				label: "Compton-Rancho Dom",
				value: "520000"
			},
			{
				label: "Daly City Serramonte",
				value: "330000"
			}]
		};
		
		//--Chart Type Pie -ptr.nov-
		$scope.myDataSourcePie = {
		chart: {
			caption: "Chart Type Pie Author : -ptr.nov-",
			subcaption: "Last Year",
			startingangle: "120",
			showlabels: "0",
			showlegend: "1",
			enablemultislicing: "0",
			slicingdistance: "15",
			showpercentvalues: "1",
			showpercentintooltip: "0",
			plottooltext: "Age group : $label Total visit : $datavalue",
			theme: "fint"
		},
		data: [
			{
				label: "Teenage",
				value: "1250400"
			},
			{
				label: "Adult",
				value: "1463300"
			},
			{
				label: "Mid-age",
				value: "1050700"
			},
			{
				label: "Senior",
				value: "491000"
			}
		]
	}
	
	//--Chart Type mscombi2d -ptr.nov-
	$scope.myDataSourceMarketing = {
		"chart": {
        "caption": "Actual Revenues, Targeted Revenues & Profits",
        "subcaption": "Last year",
        "xaxisname": "Month",
        "yaxisname": "Amount (In USD)",
        "numberprefix": "$",
        "theme": "fint"
		},
		"categories": [
			{
				"category": [
					{
						"label": "Jan"
					},
					{
						"label": "Feb"
					},
					{
						"label": "Mar"
					},
					{
						"label": "Apr"
					},
					{
						"label": "May"
					},
					{
						"label": "Jun"
					},
					{
						"label": "Jul"
					},
					{
						"label": "Aug"
					},
					{
						"label": "Sep"
					},
					{
						"label": "Oct"
					},
					{
						"label": "Nov"
					},
					{
						"label": "Dec"
					}
				]
			}
		],
		"dataset": [
			{
				"seriesname": "Actual Revenue",
				"data": [
					{
						"value": "16000"
					},
					{
						"value": "20000"
					},
					{
						"value": "18000"
					},
					{
						"value": "19000"
					},
					{
						"value": "15000"
					},
					{
						"value": "21000"
					},
					{
						"value": "16000"
					},
					{
						"value": "20000"
					},
					{
						"value": "17000"
					},
					{
						"value": "25000"
					},
					{
						"value": "19000"
					},
					{
						"value": "23000"
					}
				]
			},
			{
				"seriesname": "Projected Revenue",
				"renderas": "line",
				"showvalues": "0",
				"data": [
					{
						"value": "15000"
					},
					{
						"value": "16000"
					},
					{
						"value": "17000"
					},
					{
						"value": "18000"
					},
					{
						"value": "19000"
					},
					{
						"value": "19000"
					},
					{
						"value": "19000"
					},
					{
						"value": "19000"
					},
					{
						"value": "20000"
					},
					{
						"value": "21000"
					},
					{
						"value": "22000"
					},
					{
						"value": "23000"
					}
				]
			},
			{
				"seriesname": "Profit",
				"renderas": "area",
				"showvalues": "0",
				"data": [
					{
						"value": "4000"
					},
					{
						"value": "5000"
					},
					{
						"value": "3000"
					},
					{
						"value": "4000"
					},
					{
						"value": "1000"
					},
					{
						"value": "7000"
					},
					{
						"value": "1000"
					},
					{
						"value": "4000"
					},
					{
						"value": "1000"
					},
					{
						"value": "8000"
					},
					{
						"value": "2000"
					},
					{
						"value": "7000"
					}
				]
			}
		]
	}
	
});

app.controller("CtrlCht",function($scope,$http,$rootScope){

		//--Chart Type Line Chart -ptr.nov-		
		$scope.labels1 = ["January", "February", "March", "April", "May", "June", "July"];
		$scope.series1 = ['Series A', 'Series B'];
		$scope.data1 = [
			[65, 59, 80, 81, 56, 55, 40],
			[28, 48, 40, 19, 86, 27, 90]
		];
		$scope.onClick = function (points, evt) {
			console.log(points, evt);
		};
		
		//--Chart Type Bar Chart -ptr.nov-
		$scope.labels2 = ['2006', '2007', '2008', '2009', '2010', '2011', '2012'];
		$scope.series2 = ['Series A', 'Series B'];
		$scope.data2 = [
			[65, 59, 80, 81, 56, 55, 40],
			[28, 48, 40, 19, 86, 27, 90]
		];
		
		//--Chart Type Doughnut Chart -ptr.nov-
		$scope.labels3 = ["Download Sales", "In-Store Sales", "Mail-Order Sales"];
		$scope.data3 = [300, 500, 100];
		
		//--Chart Type Radar Chart -ptr.nov-
		$scope.labels4 =["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"];
		$scope.data4 = [
			[65, 59, 90, 81, 56, 55, 40],
			[28, 48, 40, 19, 96, 27, 100]
		];
		
		//--Chart Type Pie Chart  -ptr.nov-
		$scope.labels5 = ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"];
		$scope.data5 = [300, 500, 100, 40, 120];
		
		//--Chart Type Polar Chart -ptr.nov-
		$scope.labels6 = ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"];
		$scope.data6 = [300, 500, 100, 40, 120];
  
		//--Chart Type Dynamic Chart -ptr.nov-
		$scope.labels7 = ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"];
		$scope.data7 = [300, 500, 100, 40, 120];
		$scope.type7 = 'PolarArea';
		$scope.toggle7 = function () {
		$scope.type7 = $scope.type === 'PolarArea' ?
			'Pie' : 'PolarArea';
		};

});

app.directive('qrcode', ['$window', function($window) {

    var canvas2D = !!$window.CanvasRenderingContext2D,
        levels = {
          'L': 'Low',
          'M': 'Medium',
          'Q': 'Quartile',
          'H': 'High'
        },
        draw = function(context, qr, modules, tile) {
          for (var row = 0; row < modules; row++) {
            for (var col = 0; col < modules; col++) {
              var w = (Math.ceil((col + 1) * tile) - Math.floor(col * tile)),
                  h = (Math.ceil((row + 1) * tile) - Math.floor(row * tile));

              context.fillStyle = qr.isDark(row, col) ? '#000' : '#fff';
              context.fillRect(Math.round(col * tile),
                               Math.round(row * tile), w, h);
            }
          }
        };

    return {
      restrict: 'E',
      template: '<canvas class="qrcode"></canvas>',
      link: function(scope, element, attrs) {
        var domElement = element[0],
            $canvas = element.find('canvas'),
            canvas = $canvas[0],
            context = canvas2D ? canvas.getContext('2d') : null,
            download = 'download' in attrs,
            href = attrs.href,
            link = download || href ? document.createElement('a') : '',
            trim = /^\s+|\s+$/g,
            error,
            version,
            errorCorrectionLevel,
            data,
            size,
            modules,
            tile,
            qr,
            $img,
            setVersion = function(value) {
              version = Math.max(1, Math.min(parseInt(value, 10), 10)) || 4;
            },
            setErrorCorrectionLevel = function(value) {
              errorCorrectionLevel = value in levels ? value : 'M';
            },
            setData = function(value) {
              if (!value) {
                return;
              }

              data = value.replace(trim, '');
              qr = qrcode(version, errorCorrectionLevel);
              qr.addData(data);

              try {
                qr.make();
              } catch(e) {
                error = e.message;
                return;
              }

              error = false;
              modules = qr.getModuleCount();
            },
            setSize = function(value) {
              size = parseInt(value, 10) || modules * 2;
              tile = size / modules;
              canvas.width = canvas.height = size;
            },
            render = function() {
              if (!qr) {
                return;
              }

              if (error) {
                if (link) {
                  link.removeAttribute('download');
                  link.title = '';
                  link.href = '#_';
                }
                if (!canvas2D) {
                  domElement.innerHTML = '<img src width="' + size + '"' +
                                         'height="' + size + '"' +
                                         'class="qrcode">';
                }
                scope.$emit('qrcode:error', error);
                return;
              }

              if (download) {
                domElement.download = 'qrcode.png';
                domElement.title = 'Download QR code';
              }

              if (canvas2D) {
                draw(context, qr, modules, tile);

                if (download) {
                  domElement.href = canvas.toDataURL('image/png');
                  return;
                }
              } else {
                domElement.innerHTML = qr.createImgTag(tile, 0);
                $img = element.find('img');
                $img.addClass('qrcode');

                if (download) {
                  domElement.href = $img[0].src;
                  return;
                }
              }

              if (href) {
                domElement.href = href;
              }
            };

        if (link) {
          link.className = 'qrcode-link';
          $canvas.wrap(link);
          domElement = link;
        }

        setVersion(attrs.version);
        setErrorCorrectionLevel(attrs.errorCorrectionLevel);
        setSize(attrs.size);

        attrs.$observe('version', function(value) {
          if (!value) {
            return;
          }

          setVersion(value);
          setData(data);
          setSize(size);
          render();
        });

        attrs.$observe('errorCorrectionLevel', function(value) {
          if (!value) {
            return;
          }

          setErrorCorrectionLevel(value);
          setData(data);
          setSize(size);
          render();
        });

        attrs.$observe('data', function(value) {
          if (!value) {
            return;
          }

          setData(value);
          setSize(size);
          render();
        });

        attrs.$observe('size', function(value) {
          if (!value) {
            return;
          }

          setSize(value);
          render();
        });

        attrs.$observe('href', function(value) {
          if (!value) {
            return;
          }

          href = value;
          render();
        });
      }
    };
  }]);
