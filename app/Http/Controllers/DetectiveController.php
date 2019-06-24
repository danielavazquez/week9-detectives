<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DetectiveController extends Controller
{
    //
    public function show($detective_slug)
    {
        $detective = \App\Detective::where('slug', $detective_slug)->first();

        if (!$detective) {
            abort(404, 'Detective not found');
        }

        $view = view('detective/show');
        $view->detective = $detective;
        return $view;
    }

    public function index()
    {
        // $title = 'Welcome to Detectives Index'
        $detectives = Detectives::orderBy('name','asc')->get();
        return $view ('detective/index', compact('detectives'));
    }

    public function create()
    {
        $crime = new Crime;
        return $view('detective/show', compact('crime'));
    }

    public function store (Request $request)
    {
        $crime = new Crime;
        $detectives = Detective::findOrFail(1);
        // findOrFail($id) takes an id and returns a single model. If no matching model exist, it throws an error1. Need to know which form to update
        
        //Create Lines
        $crime->fill($request->only([
            'subject', 'description'
        ]));

        $crime->save();
        return redirect(action('DetectiveController@index'));
    }
}
