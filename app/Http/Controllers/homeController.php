<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class homeController extends Controller
{
        public function stock(){

            return view('create_stock');
            
        }

        public function manage(){
            $item = Item :: all();
             return view('stock_management',compact('item'));
        }

        

        public function receive(){
            return view('receive_item');
        }

        public function issue(){
            return view('issue_item');
        }
}



