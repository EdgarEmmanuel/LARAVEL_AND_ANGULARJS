<?php

namespace App\libs\Item;

use App\libs\Item\ItemDto;
use Illuminate\Http\Request;

interface ItemUseCase {
    public function getOneItemBySearchName($searchName);
    public function getAllItems();
    public function saveOneItem(Request $request);
    public function getOneItemById($id);
    public function deleteOneItem($id);
    public function updateOneItem(Request $request,$id);
}


?>