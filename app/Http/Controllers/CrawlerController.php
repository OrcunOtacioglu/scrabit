<?php

namespace App\Http\Controllers;

use App\Entities\Crawler;
use App\Entities\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CrawlerController extends Controller
{
    public function index()
    {
        $crawlers = Crawler::all();

        return view('dashboard.entities.crawler.list', compact('crawlers'));
    }

    public function create()
    {
        return view('dashboard.entities.crawler.create');
    }

    public function store(Request $request)
    {
        $crawler = new Crawler();

        $crawler->reference = str_random(6);
        $crawler->name = $request->name;

        $crawler->created_at = Carbon::now();
        $crawler->updated_at = Carbon::now();

        $crawler->save();

        return redirect()->action('CrawlerController@edit', ['id' => $crawler->id]);
    }

    public function edit($id)
    {
        $crawler = Crawler::findOrFail($id);

        return view('dashboard.entities.crawler.edit', compact('crawler'));
    }

    public function getItems($id)
    {
        $crawler = Crawler::findOrFail($id);

        return response()->json($crawler->items, 200);
    }

    public function getProcess($id)
    {
        $crawler = Crawler::findOrFail($id);

        return response()->json(json_decode($crawler->process), 200);
    }

    public function saveProcess(Request $request, $id)
    {
        $crawler = Crawler::findOrFail($id);
        $crawler->process = json_encode($request->process, true);

        $crawler->updated_at = Carbon::now();

        $crawler->save();

        return response()->json($crawler, 201);
    }
}
