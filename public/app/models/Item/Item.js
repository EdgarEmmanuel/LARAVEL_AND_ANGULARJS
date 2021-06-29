class Item {
    constructor(title,description){
        this.description = description;
        this.title= title;
    }
  
    getTitle(){
      return this.title;
    }
  
    getDescription(){
        return this.description;
    }

    fromItemToDto(){

        if(this.title && this.description){
            return {
                "title": this.title,
                "description": this.description,
            }
        }
        return {};
    }




}