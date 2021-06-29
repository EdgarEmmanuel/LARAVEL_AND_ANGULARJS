app

// ================== hlepr Functions ===================
.service("appHelper",function($http){
    this.generateDateWithMyslFormat = function(){
        date = new Date();
        year = date.getFullYear();
        month = this.makeWithTwoNumber(date.getMonth()+1);
        day = this.makeWithTwoNumber(date.getDate());
        hour = this.makeWithTwoNumber(date.getHours());
        minutes = this.makeWithTwoNumber(date.getMinutes());
        seconds = this.makeWithTwoNumber(date.getSeconds());

        return finalDate = `${year}-${month}-${day} ${hour}:${minutes}:${seconds}`;
    },
    this.makeWithTwoNumber = function(number){
        if(number<10){
            return `0${number}`;
        }
        return number;
    },

    this.sendHttpRequest = function(endpoint_url,method,headers={"Content-Type":"application/json"},data={}){
        return $http({
            method: method,
            url: endpoint_url,
            data: data,
            headers: headers
        });
    },
    this.reloadPage = function (){
        location.reload();
    }
})
// ======================== iziToast Helper ===========================
.service("iziToastHelper",function(appHelper){
    this.displaySimpleToast = function (type,title,message,callback={opening:false,opened:false,closing:false,closed:false}){
        switch(type){
            case 'success':
                    this.successToast(title,message,callback);
                break;
            default:
                break;
        }
    },
    this.successToast = function(title,message,callback){
        let basicToastConfiguration = {timeout: 5000, icon: 'fa fa-chrome', title: title, message: message};
        if(callback.closed){
            basicToastConfiguration = {
                ...basicToastConfiguration,
                onClosed:function (){
                    appHelper.reloadPage();
                }
            };
        }
        iziToast.success(basicToastConfiguration);
    }
    this.complexToast = function(){
        iziToast.show({
            color: 'dark',
            icon: 'fa fa-user',
            title: 'Hey',
            message: 'Custom Toast!',
            position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
              [
                '<button>Ok</button>',
                function (instance, toast) {
                  alert("Hello world!");
                }
              ],
              [
                '<button>Close</button>',
                function (instance, toast) {
                  instance.hide({
                    transitionOut: 'fadeOutUp'
                  }, toast);
                }
              ]
            ]
          });
    }
})