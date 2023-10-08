<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreRequest;
use App\Http\Resources\StoreResource;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        return StoreResource::collection(Store::paginate());
    }

    public function show(Store $store)
    {
        return new StoreResource($store);
    }

    public function store(StoreRequest $request)
    {
        return new StoreResource(Store::create($request->all()));
    }

    public function destroy($id)
    {
        return Store::find($id)->delete();
    }

    public function update(Store $store, StoreRequest $request)
    {
        return $store->update($request->all());
    }
}
