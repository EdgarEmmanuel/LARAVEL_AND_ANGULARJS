app.service("appHelper",function(){
    this.generateDateToIsoString = function(){
        return new Date().toISOString();
    }
})