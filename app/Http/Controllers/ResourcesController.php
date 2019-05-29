<?php

namespace App\Http\Controllers;

use App\Jobs\DownloadResource;
use App\Resource;
use App\Http\Requests\ResourceRequest;


class ResourcesController extends Controller
{
    /**
     * Show resources listing.
     *
     * @return View
     */
    public function index()
    {

        return view('resources.list');
    }
     public function listing()
    {
        $resources = Resource::orderByDesc('created_at')->with('status')->get();
        return response()->json(['success' => 'true','data'=>$resources]);
    }


    /**
     * Show the form for adding resource.
     *
     * @return View
     */
    public function create()
    {

        return view('resources.create');

    }

    /**
     * Add new resource to queue.
     *
     * @param ResourceRequest $request
     * @return mixed
     */
    public function store(ResourceRequest $request)
    {

        $resource = Resource::create(['url' => $request->url, 'status_id' => 1]);
        DownloadResource::dispatch($resource);
        return response()->json(['success' => 'true']);
    }
    public function add(ResourceRequest $request)
    {

        $resource = Resource::create(['url' => $request->url, 'status_id' => 1]);
        DownloadResource::dispatch($resource);
        return redirect()->back()->with('success','Success');
    }

}
