<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreatePegawaiRequest;
use App\Http\Requests\Admin\UpdatePegawaiRequest;
use App\Repositories\Admin\PegawaiRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Input;
use File;

class PegawaiController extends InfyOmBaseController
{
    /** @var  PegawaiRepository */
    private $pegawaiRepository;

    public function __construct(PegawaiRepository $pegawaiRepo)
    {
        $this->pegawaiRepository = $pegawaiRepo;
    }

    /**
     * Display a listing of the Pegawai.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pegawaiRepository->pushCriteria(new RequestCriteria($request));
        $pegawais = $this->pegawaiRepository->all();

        return view('admin.pegawais.index')
            ->with('pegawais', $pegawais);
    }

    /**
     * Show the form for creating a new Pegawai.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pegawais.create');
    }

    /**
     * Store a newly created Pegawai in storage.
     *
     * @param CreatePegawaiRequest $request
     *
     * @return Response
     */
    public function store(CreatePegawaiRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('foto')) {
            $extension = Input::file('foto')->getClientOriginalExtension();
            $filename = $input['username'].'.'.$extension;
            $request->file('foto')->move('foto' , $filename);
            $input['foto'] = $filename;
        }
        $input['password'] = bcrypt($input['password']);
        // $input['remember_token'] = str_random(60);
        $pegawai = $this->pegawaiRepository;
        $pegawai->create($input);


        Flash::success('Pegawai saved successfully.');

        return redirect(route('admin.pegawais.index'));
    }

    /**
     * Display the specified Pegawai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('admin.pegawais.index'));
        }

        return view('admin.pegawais.show')->with('pegawai', $pegawai);
    }

    /**
     * Show the form for editing the specified Pegawai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');            

            return redirect(route('admin.pegawais.index'));
        }

        return view('admin.pegawais.edit')->with('pegawai', $pegawai);
    }

    /**
     * Update the specified Pegawai in storage.
     *
     * @param  int              $id
     * @param UpdatePegawaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePegawaiRequest $request)
    {
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('admin.pegawais.index'));
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        if ($request->hasFile('foto')) {

            $extension = Input::file('foto')->getClientOriginalExtension();
            $filename = $input['username'].'.'.$extension;
            $request->file('foto')->move('foto' , $filename);
            $input['foto'] = $filename;
        }
        $pegawai = $this->pegawaiRepository->update($input, $id);

        Flash::success('Pegawai updated successfully.');

        return redirect(route('admin.pegawais.index'));
    }

    /**
     * Remove the specified Pegawai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('admin.pegawais.index'));
        }

        try{
            File::delete('foto/'.$pegawai->foto);
        }catch(Exception $e){

        }        

        $this->pegawaiRepository->delete($id);

        Flash::success('Pegawai deleted successfully.');

        return redirect(route('admin.pegawais.index'));
    }

    public function showLogin(){
        return view('pegawai.login');
    }

}
