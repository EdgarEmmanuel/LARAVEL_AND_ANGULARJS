class ItemUseCase{

    getItemDto(item){

        if(item instanceof  Item){
            return itemDataInJSON = {
                "title": item.title,
                "description": item.description
            }
        }
        return {};
        

    }

}