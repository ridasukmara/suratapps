<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateKlasifikasiRequest;
use App\Http\Requests\Admin\UpdateKlasifikasiRequest;
use App\Repositories\Admin\KlasifikasiRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;


class KlasifikasiController extends InfyOmBaseController
{
    /** @var  KlasifikasiRepository */
    private $klasifikasiRepository;

    public function __construct(KlasifikasiRepository $klasifikasiRepo)
    {
        $this->klasifikasiRepository = $klasifikasiRepo;        
    }

    
    /**
     * Display a listing of the Klasifikasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->klasifikasiRepository->pushCriteria(new RequestCriteria($request));
        $klasifikasis = $this->klasifikasiRepository->all();

        return view('admin.klasifikasis.index')
            ->with('klasifikasis', $klasifikasis);
    }

    /**
     * Show the form for creating a new Klasifikasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.klasifikasis.create');
    }

    /**
     * Store a newly created Klasifikasi in storage.
     *
     * @param CreateKlasifikasiRequest $request
     *
     * @return Response
     */
    public function store(CreateKlasifikasiRequest $request)
    {
        $input = $request->all();

        $klasifikasi = $this->klasifikasiRepository->create($input);

        Flash::success('Klasifikasi saved successfully.');

        return redirect(route('admin.klasifikasis.index'));
    }

    /**
     * Display the specified Klasifikasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $klasifikasi = $this->klasifikasiRepository->findWithoutFail($id);

        if (empty($klasifikasi)) {
            Flash::error('Klasifikasi not found');

            return redirect(route('admin.klasifikasis.index'));
        }

        return view('admin.klasifikasis.show')->with('klasifikasi', $klasifikasi);
    }

    /**
     * Show the form for editing the specified Klasifikasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $klasifikasi = $this->klasifikasiRepository->findWithoutFail($id);

        if (empty($klasifikasi)) {
            Flash::error('Klasifikasi not found');

            return redirect(route('admin.klasifikasis.index'));
        }

        return view('admin.klasifikasis.edit')->with('klasifikasi', $klasifikasi);
    }

    /**
     * Update the specified Klasifikasi in storage.
     *
     * @param  int              $id
     * @param UpdateKlasifikasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKlasifikasiRequest $request)
    {
        $klasifikasi = $this->klasifikasiRepository->findWithoutFail($id);

        if (empty($klasifikasi)) {
            Flash::error('Klasifikasi not found');

            return redirect(route('admin.klasifikasis.index'));
        }

        $klasifikasi = $this->klasifikasiRepository->update($request->all(), $id);

        Flash::success('Klasifikasi updated successfully.');

        return redirect(route('admin.klasifikasis.index'));
    }

    /**
     * Remove the specified Klasifikasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $klasifikasi = $this->klasifikasiRepository->findWithoutFail($id);

        if (empty($klasifikasi)) {
            Flash::error('Klasifikasi not found');

            return redirect(route('admin.klasifikasis.index'));
        }

        $this->klasifikasiRepository->delete($id);

        Flash::success('Klasifikasi deleted successfully.');

        return redirect(route('admin.klasifikasis.index'));
    }
}
