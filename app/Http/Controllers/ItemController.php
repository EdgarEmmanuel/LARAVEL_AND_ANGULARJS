<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libs\Item\ItemUseCase;
use App\libs\Item\ItemDto;
use App\Item;

class ItemController extends Controller
{
    private $_itemUseCase;
    
    public function __construct(ItemUseCase $itemUseCase)
    {
        $this->_itemUseCase = $itemUseCase;
    }

    public function index(Request $request){
        $itemName = $request->get('search');

        if($itemName){
            $items = $this->_itemUseCase->getOneItemBySearchName($itemName);
        }else{
            $items = $this->_itemUseCase->getAllItems();
        }
        return response()->json($items);
    }

    public function store(Request $request){
        $data = $this->_itemUseCase->saveOneItem($request);
        return response()->json($data,200);
    }

    public function show($id){
        $data = $this->_itemUseCase->getOneItemById($id);
        return response()->json($data,200);
    }

    public function edit($id){
        $data = $this->_itemUseCase->getOneItemById($id);
        return response()->json($data);
    }

    public function update(Request $request , $id){
        $data = $this->_itemUseCase->updateOneItem($request , $id );
        return response()->json($data);
    }

    public function destroy($id){
        $data = $this->_itemUseCase->deleteOneItem($id);
        return response()->json($data);
    }

}
