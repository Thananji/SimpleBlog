<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Story;


class SearchController extends Controller
{
    //
    public function stories(Request $request)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('query')) {

            // Using the Laravel Scout syntax to search the products table.
            $stories = Story::Where('content', 'like', '%' . $request->get('query') . '%')->orWhere('title', 'like', '%' . $request->get('query') . '%')->take(12)->get();

            // If there are results return them, if none, return the error message.
            return $stories->count() ? $stories : $error;

        }

        // Return the error message if no keywords existed
        return $error;

    }
    public function publishedstories(Request $request)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('query')) {

            // Using the Laravel Scout syntax to search the products table.
            $stories = Story::Where('is_published', 'Yes')->Where(function ($query) use($request) {
                $query->where('title', 'like', '%' . $request->get('query') . '%')
                      ->orWhere('content', 'like', '%' . $request->get('query') . '%');
            })->take(12)->get();

            // If there are results return them, if none, return the error message.
            return $stories->count() ? $stories : $error;

        }

        // Return the error message if no keywords existed
        return $error;

    }
}
