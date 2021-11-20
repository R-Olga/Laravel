<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        $id = 0;
        return view('news.index', ['news'=>$news, 'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = new News();
        return view('news.create', ['news'=>$news]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'summary'=> 'required|max:50',
            'short_descrition' => 'required|max:150',
            'full_text' => 'required|max:5000'
        ]);


        $news = new News();
        $news->summary = $request->summary;
        $news->short_descrition = $request->short_descrition;
        $news->full_text = $request->full_text;

        $fname = $request->file('image');
        if($fname != null)
        {
            $originalname = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/images', $originalname);
            $news->image = '/images/'.$originalname;
        }
        else
        {
            $news->image = '';
        }

        if (!$news->save()) {
            $err = $news->getErrors();
            return redirect()->action('NewsController@create')->with('error', $err)->withInput();
        }

        return redirect()->action('NewsController@create')->with('message', 'News successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.create', ['news'=>$news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'summary'=> 'required|max:50',
            'short_descrition' => 'required|max:150',
            'full_text' => 'required|max:5000'
        ]);

        $news = News::find($id);
        $news->summary = $request->summary;
        $news->short_descrition = $request->short_descrition;
        $news->full_text = $request->full_text;

        $fname = $request->file('image');
        if($fname != null)
        {
            $originalname = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/images', $originalname);
            $news->image = '/images/'.$originalname;
        }
        else
        {
            $news->image = '';
        }
        $news->save();
        return redirect('news/'.$news->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
