<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Suratmasuk;
use App\Lampiran;
use Flash;
use Illuminate\Support\Facades\Input;
use Response;
use Carbon;

class LampiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

         $lampirans = Lampiran::where('id_suratmasuk', $id)->get();
        // $lampirans = Lampiran::all();

         $suratmasuk =  Suratmasuk::findOrFail($id);
         return view('admin.lampirans.index', compact(['lampirans', 'suratmasuk']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $suratmasuk =  Suratmasuk::findOrFail($id);
        return view('admin.lampirans.create', compact('suratmasuk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        
        $input = $request->all();
        $id_suratmasuk = $input['id_suratmasuk'];
        $suratmasuk = Suratmasuk::findOrFail($id_suratmasuk);

        if ($request->hasFile('lampiran')) {
            $extension = Input::file('lampiran')->getClientOriginalExtension();
            $unique = Carbon\Carbon::now()->format('dmYHs');
            $filename = 'L-'.$unique.' - '. Input::file('lampiran')->getClientOriginalName();   
            $path = storage_path('lampiran');
            $request->file('lampiran')->move($path , $filename);
            $input['lampiran'] = $filename;
        }

        $lampiran = new Lampiran();
        $lampiran->lampiran = $input['lampiran'];
        $lampiran->id_suratmasuk = $input['id_suratmasuk'];
        $lampiran->save();

        $lampirans = Lampiran::where('id_suratmasuk', $id_suratmasuk)->get();

        Flash::success('Lampiran saved successfully.');

        return view('admin.lampirans.index', compact(['lampirans', 'suratmasuk']));

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $lamp)
    {
        
       $lampiran = Lampiran::findOrFail($lamp);
       $suratmasuk = Suratmasuk::findOrFail($id);
       
        //return view('admin.lampirans.show', compact(['lampiran', 'suratmasuk']));

        $filename = $lampiran->lampiran;
        $path = storage_path('lampiran/'.$filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lampiran = Lampiran::findOrFail($id);
        $id_suratmasuk = $lampiran->id_suratmasuk;
        if($lampiran->delete()){
            Flash::success('Lampiran deleted successfully.');
            return redirect()->action('Admin\LampiranController@index', ['suratmasuk' => $id_suratmasuk]);
        }

    }
}
