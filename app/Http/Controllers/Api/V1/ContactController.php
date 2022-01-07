<?php

namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Cont;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cont::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $cont = new Cont();
        $cont->first_name = $request->first_name;
        $cont->last_name = $request->last_name;
        $cont->subject = $request->subject;
        $cont->message = $request->message;
        $cont->save();
        return $cont;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cont = Cont::findOrFail($id);
        if($cont) return $cont;
        else 'not found';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $cont = Cont::findOrFail($id);
        $cont->first_name = $request->first_name;
        $cont->last_name = $request->last_name;
        $cont->subject = $request->subject;
        $cont->message = $request->message;
        $cont->save();
        return $cont;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cont::findOrFail($id)->delete();
        return "Deleted";
    }
}
