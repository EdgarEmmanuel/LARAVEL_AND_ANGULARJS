app.service("appHelper",function($http){
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
    }
})