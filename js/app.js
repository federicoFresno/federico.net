var app = angular.module('federico', ['ngAnimate', 'vcRecaptcha']);
var alerts = [];
app.factory('UI', function () {
	function arrayObjectIndexOf(myArray, searchTerm, property) {
    for(var i = 0, len = myArray.length; i < len; i++) {
        if (myArray[i][property] === searchTerm) return i;
    }
    return -1;
  }

	var alert_action_fac = function (action, action_var){
		//action_var = (action_var || false);
		switch (action){
			case 'push':
				var ui_alert = action_var;
				var ui_alert_index = arrayObjectIndexOf(alerts, ui_alert.msg, 'msg');
				if (ui_alert_index !=-1)
					alerts.splice(ui_alert_index, 1);
				alerts.unshift(ui_alert);
				break;
			case 'hide':
				var index = action_var;
				alerts[index].hide=true;
				break;
			case 'empty':
				alerts = [];
			break;
			case 'return_alerts':
				return alerts;
			break;
		}
	};

	var alert_fac = function (alert_type,msg,append){
		if (typeof append === "undefined")
			append = true;
    var div = '#alerts';
		var alertType='';
    var color='';
		var alert_icon='';
    var alert_types=[
      "success",
      "error",
      "warning",
      "info"
    ];
    if (alert_types.indexOf(alert_type) == -1){
      alert_type = 'info';
    }
    var alerts = {
      success: {
        color: 'green',
        icon: 'check_circle'
      },
      error: {
        color: 'red',
        icon: 'error'
      },
      warning: {
        color: 'amber',
        icon: 'warning'
      },
      info: {
        color: 'blue',
        icon: 'info'
      }
    };

		ui_alert = {
			color: alerts[alert_type].color,
			icon: alerts[alert_type].icon,
			hide: false,
			msg: msg
		};

		if (!append)
			alert_action_fac('empty');

		alert_action_fac('push', ui_alert);
	};
	// ---- END Alert Function

	// ---- Foundation UI Initialization
	var initialize_fac = function(){
		$(document).ready(function () {
      if ($('.table-contents-wrapper').length){
        $('.table-contents-wrapper .row').pushpin({
        top: $('.table-contents-wrapper').offset().top
      });
      }

    $('.button-collapse').sideNav({
      edge:'right'
    });
    $('.parallax').parallax();
    $('.tooltipped').tooltip({
      delay: 50
    });
    $('.slider').slider({
      full_width: true
    });
    $('.modal-trigger').leanModal();
    $('.scrollspy').scrollSpy();
    $('.dropdown-button').dropdown({
      inDuration: 300
      , outDuration: 225
      , constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    });
    });
	}
	// ---- END Semantic-UI Initialization

	return{
		alert: function alert(alert_type,msg,div,append,transitions)
		{
			return alert_fac(alert_type,msg,div,append,transitions);
		},
		alert_action: function alert_action(action, action_var)
		{
			return alert_action_fac(action, action_var);
		},
		initialize: function initialize()
		{
			return initialize_fac();
		}
	}
});

app.controller('mainCtrl', ['$scope', '$timeout', '$window', '$http', 'UI', function ($scope, $timeout, $window, $http, UI) {
  UI.initialize();  function get_url_path() {    return window.location.href.slice(20); //  25 is "http://12.36.126.71/" string length  };	$scope.alert_hide = function (index){		$scope.alerts = UI.alert_action('hide', index);		alerts_bind();	}	var alerts_bind = function (){		$scope.alerts = UI.alert_action('return_alerts');	};	if (get_url_path() == 'get-started'){		//UI.alert('warning','Select the services you need...');		//alerts_bind();	}  $scope.gs_comp = 5;  $scope.submitted = false;  $scope.page = get_url_path();  $scope.date = new Date();  $scope.goTo = function (page) {    window.location = "/" + page;  };
  $scope.openTab = function (position,movement) {		if (position==2 && movement > 0)			tab = "contact";		else			tab=$scope.objModel.services[position+movement].title;		$scope.gs_comp+=(25*movement);    $('ul.tabs').tabs('select_tab', tab);    $window.scrollTo(0, 0);    return;  };
  $scope.services = [      'services',			'it',			'telecom',			'total-care',			'business-continuity',			'backup',			'case-study'    ];  var mail_sent = function (data, parameters){    $scope.mail_confirmation=data;  };  $scope.send_data = function (parameters, callback){    var postRequest = $http({      method: "POST",      url: "/mail",      data: $.param({data:parameters,type:parameters.type}),      headers: {'Content-Type': 'application/x-www-form-urlencoded'},    });    postRequest.success(      function(data) {        console.log('mail post successful. Parameters: ' + JSON.stringify(parameters));        callback(data, parameters);      }    );    postRequest.error(      function() {        UI.alert('error','There was an issue with your request, please try again later.')        console.error('mail post failed. Parameters: ' + JSON.stringify(parameters));        return false;      }    );  };  var captcha_bool = false;  $scope.contact_obj = {      type: 'contact',			contact:{				captcha: '',	      name: '',	      email: '',	      phone: '',				company: '',	      interests: [	        {title: 'IT Services', value: false},	        {title: 'Telecom Services', value: false},	        {title: 'Other Services', value: false}	      ],	      message: ''			}  };	$scope.valid = {			email: false,			phone: false,			recaptcha: false		};  $scope.captcha_success = function (){    $scope.valid.recaptcha = true;  }  $scope.submit = function (data_obj){		UI.alert_action('empty');		function check_email() {			var validateEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;			if (!validateEmail.test(data_obj.contact.email) && typeof data_obj.contact.email == "undefined" )				UI.alert('error','The email you\'ve entered is invalid.');			else if (!validateEmail.test(data_obj.contact.email)){}			else				$scope.valid.email = true;		}		function check_phone() {			if (data_obj.contact.phone.length < 7)				UI.alert('error','The phone number you\'ve entered is invalid.');			else if (data_obj.contact.phone.length == 0){}			else				$scope.valid.phone = true;		}		function check_contact() {			if ($scope.valid.email || $scope.valid.phone)				return true			return false		}		function check_recaptcha() {			if (!$scope.valid.recaptcha)				UI.alert('error','Captcha is not complete.');		}		check_email();		check_phone();		check_contact();		check_recaptcha();		if (!$scope.valid.email && !$scope.valid.phone){			UI.alert('error','Please leave a phone number or valid email address.');		};		alerts_bind();		if (check_contact() && $scope.valid.recaptcha){			$scope.send_data(data_obj, mail_sent);      $scope.submitted=true;			$scope.gs_comp = 100;		};  };  $scope.radioDirective=function(arr,i){    for(rD=0;rD<arr.length;rD++){      if(rD==i){        arr[rD].value=true;      }else{        arr[rD].value=false;      }    }  }	$scope.objModel={		type:"get_started",		services:[			{	      title:"it",			  options:	      [	        {	          title:"Network",	          type:"checkbox",	          options:[	            {title:"Network Assessment",value:false},	            {title:"Network Monitoring",value:false},	            {title:"Network Security",value:false},	            {title:"Network Optimization",value:false}	          ]	        },	        {	          title:"Security",	          type:"checkbox",	          options:[	            {title:"Spam Filtering",value:false},							{title:"Server / Workstation Patching",value:false},	            {title:"Antivirus",value:false}	          ]	        }	      ]			},{	      title:"backup",			  options:	      [	        {	          title:"Backups",	          type:"checkbox",	          options:[	            {title:"Server Backups",value:false},	            {title:"Database Backup",value:false},	            {title:"Full PC Backups",value:false},	            {title:"Offsite Data Storage",value:false}	          ]	        }	      ]			},			{	      title:"telecom",			  options:[	        {	          title:"VOIP Solutions",	          type:"checkbox",	          options:[	            {title:"VOIP System Support",value:false},	            {title:"New VOIP System",value:false}	          ]	        },	        {	          title:"AVAYA Solutions",	          type:"checkbox",	          options:[	            {title:"AVAYA System Support",value:false},	            {title:"New AVAYA System/Products",value:false}	          ]	        }	      ]			}		],		contact:{      captcha: '',      name: '',      email: '',      phone: '',			company: '',      message: ''		}	};
}]);// end controller
