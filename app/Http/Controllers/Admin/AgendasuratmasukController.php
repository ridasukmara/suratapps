<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateAgendasuratmasukRequest;
use App\Http\Requests\Admin\UpdateAgendasuratmasukRequest;
use App\Repositories\Admin\AgendasuratmasukRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AgendasuratmasukController extends InfyOmBaseController
{
    /** @var  AgendasuratmasukRepository */
    private $agendasuratmasukRepository;

    public function __construct(AgendasuratmasukRepository $agendasuratmasukRepo)
    {
        $this->agendasuratmasukRepository = $agendasuratmasukRepo;
    }

    /**
     * Display a listing of the Agendasuratmasuk.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agendasuratmasukRepository->pushCriteria(new RequestCriteria($request));
        $agendasuratmasuks = $this->agendasuratmasukRepository->all();

        return view('admin.agendasuratmasuks.index')
            ->with('agendasuratmasuks', $agendasuratmasuks);
    }

    /**
     * Show the form for creating a new Agendasuratmasuk.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.agendasuratmasuks.create');
    }

    /**
     * Store a newly created Agendasuratmasuk in storage.
     *
     * @param CreateAgendasuratmasukRequest $request
     *
     * @return Response
     */
    public function store(CreateAgendasuratmasukRequest $request)
    {
        $input = $request->all();

        $agendasuratmasuk = $this->agendasuratmasukRepository->create($input);

        Flash::success('Agendasuratmasuk saved successfully.');

        return redirect(route('admin.agendasuratmasuks.index'));
    }

    /**
     * Display the specified Agendasuratmasuk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agendasuratmasuk = $this->agendasuratmasukRepository->findWithoutFail($id);

        if (empty($agendasuratmasuk)) {
            Flash::error('Agendasuratmasuk not found');

            return redirect(route('admin.agendasuratmasuks.index'));
        }

        return view('admin.agendasuratmasuks.show')->with('agendasuratmasuk', $agendasuratmasuk);
    }

    /**
     * Show the form for editing the specified Agendasuratmasuk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agendasuratmasuk = $this->agendasuratmasukRepository->findWithoutFail($id);

        if (empty($agendasuratmasuk)) {
            Flash::error('Agendasuratmasuk not found');

            return redirect(route('admin.agendasuratmasuks.index'));
        }

        return view('admin.agendasuratmasuks.edit')->with('agendasuratmasuk', $agendasuratmasuk);
    }

    /**
     * Update the specified Agendasuratmasuk in storage.
     *
     * @param  int              $id
     * @param UpdateAgendasuratmasukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgendasuratmasukRequest $request)
    {
        $agendasuratmasuk = $this->agendasuratmasukRepository->findWithoutFail($id);

        if (empty($agendasuratmasuk)) {
            Flash::error('Agendasuratmasuk not found');

            return redirect(route('admin.agendasuratmasuks.index'));
        }

        $agendasuratmasuk = $this->agendasuratmasukRepository->update($request->all(), $id);

        Flash::success('Agendasuratmasuk updated successfully.');

        return redirect(route('admin.agendasuratmasuks.index'));
    }

    /**
     * Remove the specified Agendasuratmasuk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agendasuratmasuk = $this->agendasuratmasukRepository->findWithoutFail($id);

        if (empty($agendasuratmasuk)) {
            Flash::error('Agendasuratmasuk not found');

            return redirect(route('admin.agendasuratmasuks.index'));
        }

        $this->agendasuratmasukRepository->delete($id);

        Flash::success('Agendasuratmasuk deleted successfully.');

        return redirect(route('admin.agendasuratmasuks.index'));
    }
}
