<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSuratmasukRequest;
use App\Http\Requests\Admin\UpdateSuratmasukRequest;
use App\Repositories\Admin\SuratmasukRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Admin\Klasifikasi;
use App\Models\Admin\Sifatsurat;
use App\Models\Admin\Agendasuratmasuk;
use App\Models\Disposisi;
use Auth;
use App\Lampiran;

class SuratmasukController extends InfyOmBaseController
{
    /** @var  SuratmasukRepository */
    private $suratmasukRepository;

    public function __construct(SuratmasukRepository $suratmasukRepo)
    {
        $this->suratmasukRepository = $suratmasukRepo;
    }

    /**
     * Display a listing of the Suratmasuk.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->suratmasukRepository->pushCriteria(new RequestCriteria($request));
        $suratmasuks = $this->suratmasukRepository->all();

        return view('admin.suratmasuks.index')
            ->with('suratmasuks', $suratmasuks);
    }

    /**
     * Show the form for creating a new Suratmasuk.
     *
     * @return Response
     */
    public function create()
    {
        $klasifikasis = Klasifikasi::all(['id','nama_klasifikasi']);
        $sifatsurats = Sifatsurat::all(['id','nama_sifatsurat']);
        return view('admin.suratmasuks.create', compact(['klasifikasis', 'sifatsurats']));
    }

    /**
     * Store a newly created Suratmasuk in storage.
     *
     * @param CreateSuratmasukRequest $request
     *
     * @return Response
     */
    public function store(CreateSuratmasukRequest $request)
    {
        $input = $request->all();
        //$input['id_pegawai'] = Auth::user()->id;
        //hard code
        $input['id_pegawai'] = 1;

        $suratmasuk = $this->suratmasukRepository->create($input);

        $disposisi = new Disposisi();
        // hardcode created by 
        $disposisi->createdby = 1;
        $disposisi->id_suratmasuk = $suratmasuk->id;
        $disposisi->save();

        $input['id_disposisi'] = $disposisi->id;
        $agendasuratmasuk = new Agendasuratmasuk();
        $agendasuratmasuk->id_suratmasuk = $suratmasuk->id;
        $agendasuratmasuk->no_agenda = "SM-00".$suratmasuk->id;
        $agendasuratmasuk->save();

        // $lampiran = new Lampiran();
        // $lampiran->id_suratmasuk = $suratmasuk->id;
        // $lampiran->save();

        Flash::success('Suratmasuk saved successfully.');

        return redirect(route('admin.suratmasuks.index'));
    }

    /**
     * Display the specified Suratmasuk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suratmasuk = $this->suratmasukRepository->findWithoutFail($id);

        if (empty($suratmasuk)) {
            Flash::error('Suratmasuk not found');

            return redirect(route('admin.suratmasuks.index'));
        }

        return view('admin.suratmasuks.show')->with('suratmasuk', $suratmasuk);
    }

    /**
     * Show the form for editing the specified Suratmasuk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suratmasuk = $this->suratmasukRepository->findWithoutFail($id);
        $klasifikasis = Klasifikasi::all(['id','nama_klasifikasi']);
        $sifatsurats = Sifatsurat::all(['id','nama_sifatsurat']);


        if (empty($suratmasuk)) {
            Flash::error('Suratmasuk not found');

            return redirect(route('admin.suratmasuks.index'));
        }

        return view('admin.suratmasuks.edit', compact(['suratmasuk', 'klasifikasis', 'sifatsurats']));
    }

    /**
     * Update the specified Suratmasuk in storage.
     *
     * @param  int              $id
     * @param UpdateSuratmasukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSuratmasukRequest $request)
    {
        $suratmasuk = $this->suratmasukRepository->findWithoutFail($id);

        if (empty($suratmasuk)) {
            Flash::error('Suratmasuk not found');

            return redirect(route('admin.suratmasuks.index'));
        }

        $suratmasuk = $this->suratmasukRepository->update($request->all(), $id);

        Flash::success('Suratmasuk updated successfully.');

        return redirect(route('admin.suratmasuks.index'));
    }

    /**
     * Remove the specified Suratmasuk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suratmasuk = $this->suratmasukRepository->findWithoutFail($id);

        if (empty($suratmasuk)) {
            Flash::error('Suratmasuk not found');

            return redirect(route('admin.suratmasuks.index'));
        }

        $this->suratmasukRepository->delete($id);

        Flash::success('Suratmasuk deleted successfully.');

        return redirect(route('admin.suratmasuks.index'));
    }
}
