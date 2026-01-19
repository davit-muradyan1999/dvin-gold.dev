<?php

namespace App\Http\Controllers;

use App\Models\LegalNotice;
use Illuminate\Http\Request;

class LegalNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legalNotices = LegalNotice::all();
        return view('legalNotice.index', compact('legalNotices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('legalNotice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title.am' => 'required|string',
            'title.en' => 'required|string',
            'title.ru' => 'required|string',
            'description.am' => 'required|string',
            'description.en' => 'required|string',
            'description.ru' => 'required|string',
        ]);

        $title = [
            'am' => $data['title']['am'],
            'en' => $data['title']['en'],
            'ru' => $data['title']['ru']
        ];

        $description = [
            'am' => $data['description']['am'],
            'en' => $data['description']['en'],
            'ru' => $data['description']['ru']
        ];

        unset($data['title'], $data['description']);

        $legalNotice = LegalNotice::create(array_merge($data, [
            'title' => $title,
            'description' => $description
        ]));

        return redirect()->route('legalNotices.index', $legalNotice->id)->with('success', 'Legal Notice was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LegalNotice $legalNotice)
    {
        return view('legalNotice.show', compact('legalNotice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LegalNotice $legalNotice)
    {
        return view('legalNotice.edit', compact('legalNotice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LegalNotice $legalNotice)
    {
        $data = $request->validate([
        'title.am' => 'required|string',
        'title.en' => 'required|string',
        'title.ru' => 'required|string',
        'description.am' => 'required|string',
        'description.en' => 'required|string',
        'description.ru' => 'required|string',
         ]);


        $title = [
            'am' => $data['title']['am'],
            'en' => $data['title']['en'],
            'ru' => $data['title']['ru']
        ];

        $description = [
            'am' => $data['description']['am'],
            'en' => $data['description']['en'],
            'ru' => $data['description']['ru']
        ];

        unset($data['title'], $data['description']);

        $legalNotice->update(array_merge($data, [
            'title' => $title,
            'description' => $description
        ]));

        return redirect()->route('legalNotices.index', $legalNotice->id)->with('success', 'Legal Notice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( LegalNotice $legalNotice)
    {
        $legalNotice->delete();

        return redirect()->route('legalNotices.index')->with('success', 'Legal Notice deleted successfully');
    }
}
