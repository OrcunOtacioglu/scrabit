<?php

namespace App\Http\Controllers;

use App\Entities\Crawler;
use App\Entities\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CrawlerController extends Controller
{
    /**
     * Lists all the crawlers
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $crawlers = Crawler::all();

        return view('dashboard.entities.crawler.list', compact('crawlers'));
    }

    /**
     * Show the crawler creation page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.entities.crawler.create');
    }

    /**
     * Stores the new created Crawler into database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Shows the edit form of the crawler
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $crawler = Crawler::findOrFail($id);

        return view('dashboard.entities.crawler.edit', compact('crawler'));
    }

    /**
     * Returns all Crawler Items
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getItems($id)
    {
        $crawler = Crawler::findOrFail($id);

        return response()->json($crawler->items, 200);
    }

    /**
     * Returns Crawler process
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProcess($id)
    {
        $crawler = Crawler::findOrFail($id);

        return response()->json(json_decode($crawler->process), 200);
    }

    /**
     * Saves Crawler process
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveProcess(Request $request, $id)
    {
        $crawler = Crawler::findOrFail($id);
        $crawler->process = json_encode($request->process, true);

        $crawler->updated_at = Carbon::now();

        $crawler->save();

        return response()->json($crawler, 201);
    }
}
