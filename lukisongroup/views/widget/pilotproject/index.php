<?php


use kartik\icons\Icon;
use kartik\tabs\TabsX;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\rating\StarRating;
use kartik\builder\Form;
use lukisongroup\models\widget\Pilotproject;
//use leandrogehlen\treegrid\TreeGrid;
/* @var $this yii\web\View */
/* @var $searchModel lukisongroup\models\widget\PilotprojectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use kartik\helpers\Html;
use lukisongroup\assets\AppAssetChart;  	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAssetChart::register($this);

$this->registerJs('FusionCharts.ready(function () {
    var chart = new FusionCharts({
        type: "gantt",
        renderAt: "chart-container",
        width: "100%",
        height: "600",
        dataFormat: "json",
        dataSource: {
            "chart": {
                "caption": "LukisonGroup Pilot Project",
                "subcaption": "Planned vs Actual",                
                "dateformat": "dd/mm/yyyy",
                "outputdateformat": "ddds mns yy",
                "ganttwidthpercent": "70",
                "ganttPaneDuration": "50",
                "ganttPaneDurationUnit": "d",
                "plottooltext": "$processName{br} $label starting date $start{br}$label ending date $end",
                "theme": "fint"
            },
            "categories": [
                {
                    "bgcolor": "#33bdda",
                    "category": [
                        {
                            "start": "1/4/2014",
                            "end": "30/6/2014",
                            "label": "Months",
                            "align": "middle",
                            "fontcolor": "#ffffff",
                            "fontsize": "16"
                        }
                    ]
                },
                {
                    "bgcolor": "#33bdda",
                    "align": "middle",                                                        
                    "fontcolor": "#ffffff",
                    "fontsize": "16",
                    "category": [
                        {
                            "start": "1/4/2014",
                            "end": "30/4/2014",
                            "label": "April"                            
                        },
                        {
                            "start": "1/5/2014",
                            "end": "31/5/2014",
                            "label": "May"
                        },
                        {
                            "start": "1/6/2014",
                            "end": "30/6/2014",
                            "label": "June"
                        }
                    ]
                },
                {
                    "bgcolor": "#ffffff",
                    "fontcolor": "#1288dd",
                    "fontsize": "12",
                    "isbold": "1",
                    "align": "center",
                    "category": [
                        {
                            "start": "1/4/2014",
                            "end": "5/4/2014",
                            "label": "Week 1"
                        },
                        {
                            "start": "6/4/2014",
                            "end": "12/4/2014",
                            "label": "Week 2"
                        },
                        {
                            "start": "13/4/2014",
                            "end": "19/4/2014",
                            "label": "Week 3"
                        },
                        {
                            "start": "20/4/2014",
                            "end": "26/4/2014",
                            "label": "Week 4"
                        },
                        {
                            "start": "27/4/2014",
                            "end": "3/5/2014",
                            "label": "Week 5"
                        },
                        {
                            "start": "4/5/2014",
                            "end": "10/5/2014",
                            "label": "Week 6"
                        },
                        {
                            "start": "11/5/2014",
                            "end": "17/5/2014",
                            "label": "Week 7"
                        },
                        {
                            "start": "18/5/2014",
                            "end": "24/5/2014",
                            "label": "Week 8"
                        },
                        {
                            "start": "25/5/2014",
                            "end": "31/5/2014",
                            "label": "Week 9"
                        },
                        {
                            "start": "1/6/2014",
                            "end": "7/6/2014",
                            "label": "Week 10"
                        },
                        {
                            "start": "8/6/2014",
                            "end": "14/6/2014",
                            "label": "Week 11"
                        },
                        {
                            "start": "15/6/2014",
                            "end": "21/6/2014",
                            "label": "Week 12"
                        },
                        {
                            "start": "22/6/2014",
                            "end": "28/6/2014",
                            "label": "Week 13"
                        }
                    ]
                }
            ],
            "processes": {
                "headertext": "Task",
                "fontcolor": "#000000",
                "fontsize": "11",
                "isanimated": "1",
                "bgcolor": "#6baa01",
                "headervalign": "bottom",
                "headeralign": "left",
                "headerbgcolor": "#6baa01",
                "headerfontcolor": "#ffffff",
                "headerfontsize": "16",
                "align": "left",
                "isbold": "1",
                "bgalpha": "25",
                "process": [
                    {
                        "label": "Clear site",
                        "id": "1"
                    },
                    {
                        "label": "Dashboard",
                        "id": "2",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "HRM",
                        "id": "3",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Footing to DPC",
                        "id": "4",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Drainage Services",
                        "id": "5",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Backfill",
                        "id": "6",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Ground Floor",
                        "id": "7"
                    },
                    {
                        "label": "Walls on First Floor",
                        "id": "8"
                    },
                    {
                        "label": "First Floor Carcass",
                        "id": "9",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "First Floor Deck",
                        "id": "10",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Roof Structure",
                        "id": "11"
                    },
                    {
                        "label": "Roof Covering",
                        "id": "12"
                    },
                    {
                        "label": "Rainwater Gear",
                        "id": "13"
                    },
                    {
                        "label": "Windows",
                        "id": "14"
                    },
                    {
                        "label": "External Doors",
                        "id": "15"
                    },
                    {
                        "label": "Connect Electricity",
                        "id": "16"
                    },
                    {
                        "label": "Connect Water Supply",
                        "id": "17",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Install Air Conditioning",
                        "id": "18",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Interior Decoration",
                        "id": "19",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Fencing And signs",
                        "id": "20"
                    },
                    {
                        "label": "Exterior Decoration",
                        "id": "21",
                        "hoverBandColor": "#e44a00",
                        "hoverBandAlpha": "40"
                    },
                    {
                        "label": "Setup racks",
                        "id": "22"
                    }
                ]
            },
           
            "tasks": {
                "task": [
                    {
                        "label": "Planned",
                        "processid": "1",
                        "start": "9/4/2014",
                        "end": "12/4/2014",
                        "id": "1-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "1",
                        "start": "9/4/2014",
                        "end": "12/4/2014",
                        "id": "1",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "2",
                        "start": "13/4/2014",
                        "end": "23/4/2014",
                        "id": "2-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "2",
                        "start": "13/4/2014",
                        "end": "25/4/2014",
                        "id": "2",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Delay",
                        "processid": "2",
                        "start": "23/4/2014",
                        "end": "25/4/2014",
                        "id": "2-2",
                        "color": "#e44a00",                        
                        "toppadding": "56%",
                        "height": "32%",
                        "tooltext": "Delayed by 2 days."
                    },
                    {
                        "label": "Planned",
                        "processid": "3",
                        "start": "23/4/2014",
                        "end": "30/4/2014",
                        "id": "3-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "3",
                        "start": "26/4/2014",
                        "end": "4/5/2014",
                        "id": "3",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Delay",
                        "processid": "3",
                        "start": "3/5/2014",
                        "end": "4/5/2014",
                        "id": "3-2",
                        "color": "#e44a00",                        
                        "toppadding": "56%",
                        "height": "32%",
                        "tooltext": "Delayed by 1 days."
                    },
                    {
                        "label": "Planned",
                        "processid": "4",
                        "start": "3/5/2014",
                        "end": "10/5/2014",
                        "id": "4-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "4",
                        "start": "4/5/2014",
                        "end": "10/5/2014",
                        "id": "4",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "5",
                        "start": "6/5/2014",
                        "end": "11/5/2014",
                        "id": "5-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "5",
                        "start": "6/5/2014",
                        "end": "10/5/2014",
                        "id": "5",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "6",
                        "start": "4/5/2014",
                        "end": "7/5/2014",
                        "id": "6-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "6",
                        "start": "5/5/2014",
                        "end": "11/5/2014",
                        "id": "6",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Delay",
                        "processid": "6",
                        "start": "7/5/2014",
                        "end": "11/5/2014",
                        "id": "6-2",
                        "color": "#e44a00",                        
                        "toppadding": "56%",
                        "height": "32%",
                        "tooltext": "Delayed by 4 days."
                    },
                    {
                        "label": "Planned",
                        "processid": "7",
                        "start": "11/5/2014",
                        "end": "14/5/2014",
                        "id": "7-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "7",
                        "start": "11/5/2014",
                        "end": "14/5/2014",
                        "id": "7",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "8",
                        "start": "16/5/2014",
                        "end": "19/5/2014",
                        "id": "8-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "8",
                        "start": "16/5/2014",
                        "end": "19/5/2014",
                        "id": "8",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "9",
                        "start": "16/5/2014",
                        "end": "18/5/2014",
                        "id": "9-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "9",
                        "start": "16/5/2014",
                        "end": "21/5/2014",
                        "id": "9",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Delay",
                        "processid": "9",
                        "start": "18/5/2014",
                        "end": "21/5/2014",
                        "id": "9-2",
                        "color": "#e44a00",                        
                        "toppadding": "56%",
                        "height": "32%",
                        "tooltext": "Delayed by 3 days."
                    },
                    {
                        "label": "Planned",
                        "processid": "10",
                        "start": "20/5/2014",
                        "end": "23/5/2014",
                        "id": "10-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "10",
                        "start": "21/5/2014",
                        "end": "24/5/2014",
                        "id": "10",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Delay",
                        "processid": "10",
                        "start": "23/5/2014",
                        "end": "24/5/2014",
                        "id": "10-2",
                        "color": "#e44a00",                        
                        "toppadding": "56%",
                        "height": "32%",
                        "tooltext": "Delayed by 1 days."
                    },
                    {
                        "label": "Planned",
                        "processid": "11",
                        "start": "25/5/2014",
                        "end": "27/5/2014",
                        "id": "11-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "11",
                        "start": "25/5/2014",
                        "end": "27/5/2014",
                        "id": "11",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "12",
                        "start": "28/5/2014",
                        "end": "1/6/2014",
                        "id": "12-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "12",
                        "start": "28/5/2014",
                        "end": "1/6/2014",
                        "id": "12",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "13",
                        "start": "4/6/2014",
                        "end": "6/6/2014",
                        "id": "13-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "13",
                        "start": "4/6/2014",
                        "end": "6/6/2014",
                        "id": "13",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "14",
                        "start": "4/6/2014",
                        "end": "4/6/2014",
                        "id": "14-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "14",
                        "start": "4/6/2014",
                        "end": "4/6/2014",
                        "id": "14",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "15",
                        "start": "4/6/2014",
                        "end": "4/6/2014",
                        "id": "15-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "15",
                        "start": "4/6/2014",
                        "end": "4/6/2014",
                        "id": "15",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "16",
                        "start": "2/6/2014",
                        "end": "7/6/2014",
                        "id": "16-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "16",
                        "start": "2/6/2014",
                        "end": "7/6/2014",
                        "id": "16",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "17",
                        "start": "5/6/2014",
                        "end": "10/6/2014",
                        "id": "17-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "17",
                        "start": "5/6/2014",
                        "end": "17/6/2014",
                        "id": "17",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Delay",
                        "processid": "17",
                        "start": "10/6/2014",
                        "end": "17/6/2014",
                        "id": "17-2",
                        "color": "#e44a00",                        
                        "toppadding": "56%",
                        "height": "32%",
                        "tooltext": "Delayed by 7 days."
                    },
                    {
                        "label": "Planned",
                        "processid": "18",
                        "start": "10/6/2014",
                        "end": "12/6/2014",
                        "id": "18-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Delay",
                        "processid": "18",
                        "start": "18/6/2014",
                        "end": "20/6/2014",
                        "id": "18",
                        "color": "#e44a00",                        
                        "toppadding": "56%",
                        "height": "32%",
                        "tooltext": "Delayed by 8 days."
                    },
                    {
                        "label": "Planned",
                        "processid": "19",
                        "start": "15/6/2014",
                        "end": "23/6/2014",
                        "id": "19-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "19",
                        "start": "16/6/2014",
                        "end": "23/6/2014",
                        "id": "19",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "20",
                        "start": "23/6/2014",
                        "end": "23/6/2014",
                        "id": "20-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "20",
                        "start": "23/6/2014",
                        "end": "23/6/2014",
                        "id": "20",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Planned",
                        "processid": "21",
                        "start": "18/6/2014",
                        "end": "21/6/2014",
                        "id": "21-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "21",
                        "start": "18/6/2014",
                        "end": "23/6/2014",
                        "id": "21",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    },
                    {
                        "label": "Delay",
                        "processid": "21",
                        "start": "21/6/2014",
                        "end": "23/6/2014",
                        "id": "21-2",
                        "color": "#e44a00",                        
                        "toppadding": "56%",
                        "height": "32%",
                        "tooltext": "Delayed by 2 days."
                    },
                    {
                        "label": "Planned",
                        "processid": "22",
                        "start": "24/6/2014",
                        "end": "28/6/2014",
                        "id": "22-1",
                        "color": "#008ee4",
                        "height": "32%",
                        "toppadding": "12%"
                    },
                    {
                        "label": "Actual",
                        "processid": "22",
                        "start": "25/6/2014",
                        "end": "28/6/2014",
                        "id": "22",
                        "color": "#6baa01",                        
                        "toppadding": "56%",
                        "height": "32%"
                    }
                ]
            },
            "connectors": [
                {
                    "connector": [
                        {
                            "fromtaskid": "1",
                            "totaskid": "2",
                            "color": "#008ee4",
                            "thickness": "2",
                            "fromtaskconnectstart_": "1"
                        },
                        {
                            "fromtaskid": "2-2",
                            "totaskid": "3",
                            "color": "#008ee4",
                            "thickness": "2"
                        },
                        {
                            "fromtaskid": "3-2",
                            "totaskid": "4",
                            "color": "#008ee4",
                            "thickness": "2"
                        },
                        {
                            "fromtaskid": "3-2",
                            "totaskid": "6",
                            "color": "#008ee4",
                            "thickness": "2"
                        },
                        {
                            "fromtaskid": "7",
                            "totaskid": "8",
                            "color": "#008ee4",
                            "thickness": "2"
                        },
                        {
                            "fromtaskid": "7",
                            "totaskid": "9",
                            "color": "#008ee4",
                            "thickness": "2"
                        },
                        {
                            "fromtaskid": "12",
                            "totaskid": "16",
                            "color": "#008ee4",
                            "thickness": "2"
                        },
                        {
                            "fromtaskid": "12",
                            "totaskid": "17",
                            "color": "#008ee4",
                            "thickness": "2"
                        },
                        {
                            "fromtaskid": "17-2",
                            "totaskid": "18",
                            "color": "#008ee4",
                            "thickness": "2"
                        },
                        {
                            "fromtaskid": "19",
                            "totaskid": "22",
                            "color": "#008ee4",
                            "thickness": "2"
                        }
                    ]
                }
            ],
            "milestones": {
                "milestone": [
                    {
                        "date": "2/6/2014",
                        "taskid": "12",
                        "color": "#f8bd19",
                        "shape": "star",
                        "tooltext": "Completion of Phase 1"
                    }
                    /*{
                        "date": "21/8/2008",
                        "taskid": "10",
                        "color": "#f8bd19",
                        "shape": "star",
                        "tooltext": "New estimated moving date"
                    }*/
                ]
            },
            "legend": {
                "item": [
                    {
                        "label": "Planned",
                        "color": "#008ee4"
                    },
                    {
                        "label": "Actual",
                        "color": "#6baa01"
                    },
                    {
                        "label": "Slack (Delay)",
                        "color": "#e44a00"
                    }
                ]
            }
        }
    })
    .render();
	});
');


 /*
	$ScdlTree=TreeGrid::widget([
	  'dataProvider' => $dataProvider,
	  'keyColumnName' => 'ID',
	  'parentColumnName' => 'PARENT',
	  'columns' => [
		  //'PILOT_ID',
		  'PILOT_NM',
		  'PLAN_DATE1',
		  'PLAN_DATE2',
		  'ACTUAL_DATE1',
		  'ACTUAL_DATE2',
		  'DSCRP',
		  'STATUS',
		  ['class' => 'yii\grid\ActionColumn']
	  ]        
	]); 
    */
	
	$gv_pilot= GridView::widget([
		'id'=>'gv-pilot',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,		
	    'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
				 'label'=>'Header',
				 'attribute'=>'SORT',
				 'value'=>function ($model, $key, $index, $widget) { 
					$Proj_sort = Pilotproject::find()->where(['ID'=>$model->SORT])->one();
					return $Proj_sort->PILOT_NM;
				},
				'filter'=>ArrayHelper::map(Pilotproject::find()->where('ID=SORT')->asArray()->all(), 'ID', 'PILOT_NM'),
				'group'=>true,
			],
			[
				'label'=>'Sechedule',
				'attribute'=>'PILOT_NM',
			],
		    [
				'attribute'=>'PLAN_DATE1',
				'filterType'=> GridView::FILTER_DATE,
			],
		    [
				'attribute'=>'PLAN_DATE2',
				'filterType'=> GridView::FILTER_DATE,
			],
			[
				'attribute'=>'BOBOT',
				'format' => 'Html',
				'value'=>function ($model, $key, $index, $widget) {
							return StarRating::widget([ 'name' => 'rating_1',]);
						},
						
				
			],
		    [
				'attribute'=>'ACTUAL_DATE1',
				'filterType'=> GridView::FILTER_DATE,
			],
		    [
				'attribute'=>'ACTUAL_DATE2',
				'filterType'=> GridView::FILTER_DATE,
			],
		    [
				'label'=>'Discription',
				'attribute'=>'DSCRP',
				'mergeHeader'=>true,
				'value'=>function ($model, $key, $index, $widget) {
					if ($model->DSCRP <>'') {
						return substr($model->DSCRP , 0, 30) . ' ...'; //Author -ptr.nov- limit disply text 
					} else {
						return '';
					}
				}			
			],
			[
				'label'=>'Status',
				'attribute'=>'STATUS',	
				'format' => 'html', 
				'hAlign'=>'center',
				'value'=>function($model){
                           if ($model->STATUS == 0) {
								return Html::a('<i class="fa fa-edit"></i> &nbsp;&nbsp;&nbsp;&nbsp;Open', '',['class'=>'btn btn-success btn-sm', 'title'=>'Open']);
							} else if ($model->STATUS == 1) {
								return Html::a('<i class="fa fa-close"></i> &nbsp;&nbsp;&nbsp;&nbsp;Close', '',['class'=>'btn btn-danger btn-sm', 'title'=>'Closing']);
							} 
                        },
				'filter'=>['0'=>'Open','1'=>'Close'],	 //Author -ptr.nov Manual Filter value			
			],
            [
				'class' => 'yii\grid\ActionColumn',
				'header'=>'Action',			
			],
        ],
		/*
		'beforeHeader'=>[
			[
				'columns'=>[
					['content'=>'Header Before 1', 'options'=>['colspan'=>5, 'class'=>'text-center warning']], 
					['content'=>'Header Before 2', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
					['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
				],
				'options'=>['class'=>'skip-export'] // remove this row from export
			]
		],
		*/
		//'floatHeaderOptions'=>50,
		'pjax'=>true,
        'pjaxSettings'=>[
            'options'=>[
                'enablePushState'=>false,
                'id'=>'gv-pilot',                
               ],
        ],
		'toolbar'=> [
			['content'=>
				Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', '', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) .' ' .
				Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', ''])
			],
			'{export}',
			'{toggleData}',
		],
		'panel'=>['type'=>'info', 'heading'=>'Pilot Project'],
		'hover'=>true, //cursor select
		'responsive'=>true,
		//'responsiveWrap'=>true,
		'bordered'=>true,
		'striped'=>true,
		'autoXlFormat'=>true,
		'export'=>[//export like view grid --ptr.nov-
			'fontAwesome'=>true,
			'showConfirmAlert'=>false,
			//'target'=>GridView::TARGET_BLANK
		],
    ]); 
	
	$dsp='
	<div class="row">
	<div class="col-sm-12" id="chart-container">FusionCharts will render here</div>
	
	</div>
	';
	
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Schadule Data','content'=>$gv_pilot,
			//'active'=>true,

		],		
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Schadule Views','content'=>$dsp,
		],		
	];

	
	echo TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		//'height'=>'tab-height-xs',
		'bordered'=>true,
		'encodeLabels'=>false,
		//'align'=>TabsX::ALIGN_LEFT,

	]);
	

?>

