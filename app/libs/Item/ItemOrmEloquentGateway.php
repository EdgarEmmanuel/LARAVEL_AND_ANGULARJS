<?php

namespace App\libs\Item;
use App\libs\Item\ItemUseCase;
use App\Item;
use Illuminate\Http\Request;

class ItemOrmEloquentGateway implements ItemUseCase {


    public function getOneItemBySearchName($searchName){
         $itemFindByTheName = Item::where("title", "LIKE", "%{$searchName}%")
                 ->paginate(5);
        return $itemFindByTheName;
    }

    public function getAllItems(){
        $items = Item::paginate(5);
        return $items;
    }

    public function saveOneItem(Request $request){
        $input = $request->all();
        $create = Item::create($input);
        return $create;
    }

    public function getOneItemById($id){

       return $item = Item::find($id);

    }
    public function deleteOneItem($id){

        return $item  = Item::where('id',$id)->delete();
    }
    
    public function updateOneItem(Request $request, $id){
        $input = $request->all();
        Item::where("id",$id)->update($input);
        $item = Item::find($id);
        return $item;
    }




}