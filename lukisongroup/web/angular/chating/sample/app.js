(function() {
  'use strict';
 var a;
  angular.module('app', [,'irontec.simpleChat']);
  //angular.module('app1', ['irontec.simpleChat']);
  angular.module('app').controller('Shell1',function($scope){
	 $scope.userInit = function(uid, udept) {
     $scope.user = uid;
     $scope.dept = udept;
	 a= $scope.user;
     // Get a list of projects for user
     //$scope.projectList($scope.user);
		//console.log($scope.user);
		//console.log($scope.role);

    }
	//a= $scope.uid;
  });
  
  angular.module('app').controller('Shell', Shell);
  
  function Shell() {

    var vm = this;

    vm.messages = [
      {
        'username': 'Soni',
        'content': 'Hi!'
      },
      {
        'username': 'Piter',
        'content': 'Whats up?'
      },
      {
        'username': 'Soni',
        'content': 'I found this nice AngularJS Directive'
      },
      {
        'username': 'Devandro',
        'content': 'Looks Great!'
      }
    ];

    vm.username = a;// 'Matt';

    vm.sendMessage = function(message, username) {
      if(message && message !== '' && username) {
        vm.messages.push({
          'username': username,
          'content': message
        });
      }
    };

  }

})();
