<?php

namespace App\Http\Controllers;

use App\Entities\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $item = new Item();

        $item->crawler_id = $request->crawlerID;

        $item->reference = str_random(6);
        $item->name = $request->itemName;

        $item->xpath = trim($request->itemXpath);
        $item->css_path = trim($request->itemCssPath);
        $item->action = strtolower($request->itemAction);

        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();

        return redirect()->action('CrawlerController@edit', ['id' => $request->crawlerID]);
    }
}
