<?php

namespace App\libs\Item;

use App\libs\Item\ItemUseCase ;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ItemMysqlGateway implements ItemUseCase {
    public function getOneItemBySearchName($searchName){
        $itemFindByTheName = DB::select("select * from items where title like %:title%",['title' => $searchName]);
        return $itemFindByTheName;
    }

    public function getAllItems(){
        $items =  DB::select("select * from items ");
        return $items;
    }

    public function saveOneItem(Request $request){
        $itemDto = new ItemDto($request->get('title'),$request->get('description'));
        $itemFindByTheName = DB::insert("insert into items (null, title , description) values (:title,:description)",
        [
            'title' => $itemDto->getTitle(),
            'description' => $itemDto -> getDescription()
        ]);

        return $itemFindByTheName;
    }

    public function getOneItemById($id){

        $item = DB::select("select * from items where id = :id",['id' => $id]);
        return $item;

    }
    public function deleteOneItem($id){

        $itemDeleted = DB::update("delete from items where id = :id",
        [
            'id' => $id
        ]);
        return $itemDeleted;

    }
    public function updateOneItem(Request $request, $id){
        $itemDto = new ItemDto($request->get('title'),$request->get('description'));
        $itemUpdated = DB::update("update items set title = :title , description = :description where id = :id",
        [
            'id' => $id,
            'title' => $itemDto->getTitle(),
            'description' => $itemDto -> getDescription()
        ]);
        return $itemUpdated;

    }

}
