<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDisposisiRequest;
use App\Http\Requests\UpdateDisposisiRequest;
use App\Repositories\DisposisiRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Disposisi;
use App\Models\Admin\Suratmasuk;
use App\Models\Admin\Harap;

class DisposisiController extends InfyOmBaseController
{
    /** @var  DisposisiRepository */
    private $disposisiRepository;

    public function __construct(DisposisiRepository $disposisiRepo)
    {
        $this->disposisiRepository = $disposisiRepo;
    }

    /**
     * Display a listing of the Disposisi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $id)
    {
        $haraps = Harap::all();
        $disposisis = Disposisi::where('id_suratmasuk', $id)->get();
        $suratmasuk = Suratmasuk::findOrFail($id);
        return view('disposisis.index', compact(['disposisis', 'suratmasuk', 'haraps']));  
        
    }

    /**
     * Show the form for creating a new Disposisi.
     *
     * @return Response
     */
    public function create()
    {
        return view('disposisis.create');
    }

    /**
     * Store a newly created Disposisi in storage.
     *
     * @param CreateDisposisiRequest $request
     *
     * @return Response
     */
    public function store(CreateDisposisiRequest $request)
    {
        $input = $request->all();

        $disposisi = $this->disposisiRepository->create($input);

        Flash::success('Disposisi saved successfully.');

        return redirect(route('disposisis.index'));
    }

    /**
     * Display the specified Disposisi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, $disposisi)
    {
        $suratmasuk = Suratmasuk::findOrFail($id);
        $disposisi = $this->disposisiRepository->findWithoutFail($disposisi);

        if (empty($disposisi)) {
            Flash::error('Disposisi not found');

            return redirect(route('admin.suratmasuks.disposisi'));
        }

        return view('disposisis.show', compact(['disposisi', 'suratmasuk']));
    }

    /**
     * Show the form for editing the specified Disposisi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, $disposisi)
    {

        $suratmasuk = Suratmasuk::findOrFail($id);
        $haraps = Harap::all();

        $disposisi = $this->disposisiRepository->findWithoutFail($disposisi);

        if (empty($disposisi)) {
            Flash::error('Disposisi not found');

            return redirect(route('disposisis.index'));
        }

        return view('disposisis.edit', compact(['suratmasuk', 'disposisi', 'haraps']));
    }

    /**
     * Update the specified Disposisi in storage.
     *
     * @param  int              $id
     * @param UpdateDisposisiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDisposisiRequest $request)
    {
        $disposisi = $this->disposisiRepository->findWithoutFail($id);

        if (empty($disposisi)) {
            Flash::error('Disposisi not found');

            return redirect(route('disposisis.index'));
        }

        $input = $request->all();
        
        $input['createdby'] = 1;
        if(!$input['tanggal_verifikasi']){
            $input['tanggal_verifikasi'] = null;    
        }

        if(isset($input['verifikasi'])){
            if($input['verifikasi']=='on'){
            $input['verifikasi'] = true;
            }    
        }else{
            $input['verifikasi'] = false;
        }
        
        if(!$input['id_harap']){
            $input['id_harap'] = null;    
        }
        
        $disposisi = $this->disposisiRepository->update($input, $id);
        $suratmasuk = $disposisi->id_suratmasuk;

        Flash::success('Disposisi updated successfully.');

        return redirect(route('admin.suratmasuks.disposisi', compact(['suratmasuk'])));
    }

    /**
     * Remove the specified Disposisi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $disposisi = $this->disposisiRepository->findWithoutFail($id);

        if (empty($disposisi)) {
            Flash::error('Disposisi not found');

            return redirect(route('disposisis.index'));
        }

        $this->disposisiRepository->delete($id);

        Flash::success('Disposisi deleted successfully.');

        return redirect(route('disposisis.index'));
    }
}
