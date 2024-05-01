<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $validated = $request->validate([
            'original' => 'required|url:https',
            'short' => 'nullable|string|unique:links',
        ]);

        $shortLink = '';

        if($request->filled('short')){
            $shortLink = $request->input('short');
        }
        else {
            $shortLink = generateRandomString(5);
        }

        $newLink = Link::create([
            'original' => $validated['original'],
            'short' => $shortLink,
            'hit' => 0,
        ]);

        $newLink->save();

        return redirect()->action(
            [LinkController::class, 'show'], ['short' => $newLink->short]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $short)
    {
        $link = Link::where('short', $short)->first();
        return view('links.show', [
            'link' => $link,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }

    /**
     * Redirect short link to original link
     */
    public function besarin(string $short){
        $link = Link::where('short', $short)->first();

        $hits = $link->hit;

        $link->hit = $hits + 1;

        $link->save();
        
        return Redirect::to($link->original);
    }
}
