<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtendedLink\ExtenedLinkRequest;
use App\Http\Resources\ExtendedLinkResource;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        return ExtendedLinkResource::collection(Social::paginate());
    }

    public function show(Social $social)
    {
        return new ExtendedLinkResource($social);
    }

    public function store(ExtenedLinkRequest $request)
    {
        return new ExtendedLinkResource(Social::create($request->all()));
    }

    public function destroy($id)
    {
        return Social::find($id)->delete();
    }

    public function update(Social $social, ExtenedLinkRequest $request)
    {
        return $social->update($request->all());
    }
}
