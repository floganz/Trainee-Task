(function() {
  var app = angular.module('caesar', ['chart.js']);

  app.controller('CryptController', ['$http', function($http) { 
    var tmp=this;
    tmp.shift='';
    tmp.result='';
    tmp.guessresult='';
    tmp.frequency =[];
    tmp.labels=[];
     
    this.encrypt=function(newValue){   //Фунция шифровки сообщения
      $http.post("/encrypt.php", newValue,{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'}).success(function (data, status, headers, config) {
        tmp.result=data.result;
      })
      .error(function (data, status, header, config) {
        alert("error");
      });
    };
    
    this.decrypt=function(newValue){  //Фунция расшифровки сообщения
      $http.post("/decrypt.php", newValue,{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'}).success(function (data, status, headers, config) {
        tmp.result=data.result;
      })
      .error(function (data, status, header, config) {
        alert("error");
      });
    };
    
    this.chart=function(newValue){  //Фунция считающаяя вхождения каждого символа 
      tmp.frequency=[[]];
      $http.post("/frequency.php", newValue,{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'}).success(function (data, status, headers, config) {
        tmp.frequency[0]=data.frequency;
        tmp.labels=data.labels;
      })
      .error(function (data, status, header, config) {
        alert("error");
      });
    };
    
    this.guess=function(newValue){  //Фунция определяющая сдвиг и на его основе расшифровывает сообщение
      $http.post("/guess.php", newValue,{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'}).success(function (data, status, headers, config) {
        tmp.guessresult=data.result;
        tmp.guessShift=data.shift;
      })
      .error(function (data, status, header, config) {
        alert("error");
      });
    };
    
  }]);
})();