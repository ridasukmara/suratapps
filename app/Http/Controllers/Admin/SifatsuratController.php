<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSifatsuratRequest;
use App\Http\Requests\Admin\UpdateSifatsuratRequest;
use App\Repositories\Admin\SifatsuratRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SifatsuratController extends InfyOmBaseController
{
    /** @var  SifatsuratRepository */
    private $sifatsuratRepository;

    public function __construct(SifatsuratRepository $sifatsuratRepo)
    {
        $this->sifatsuratRepository = $sifatsuratRepo;
    }

    /**
     * Display a listing of the Sifatsurat.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sifatsuratRepository->pushCriteria(new RequestCriteria($request));
        $sifatsurats = $this->sifatsuratRepository->all();

        return view('admin.sifatsurats.index')
            ->with('sifatsurats', $sifatsurats);
    }

    /**
     * Show the form for creating a new Sifatsurat.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sifatsurats.create');
    }

    /**
     * Store a newly created Sifatsurat in storage.
     *
     * @param CreateSifatsuratRequest $request
     *
     * @return Response
     */
    public function store(CreateSifatsuratRequest $request)
    {
        $input = $request->all();

        $sifatsurat = $this->sifatsuratRepository->create($input);

        Flash::success('Sifatsurat saved successfully.');

        return redirect(route('admin.sifatsurats.index'));
    }

    /**
     * Display the specified Sifatsurat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sifatsurat = $this->sifatsuratRepository->findWithoutFail($id);

        if (empty($sifatsurat)) {
            Flash::error('Sifatsurat not found');

            return redirect(route('admin.sifatsurats.index'));
        }

        return view('admin.sifatsurats.show')->with('sifatsurat', $sifatsurat);
    }

    /**
     * Show the form for editing the specified Sifatsurat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sifatsurat = $this->sifatsuratRepository->findWithoutFail($id);

        if (empty($sifatsurat)) {
            Flash::error('Sifatsurat not found');

            return redirect(route('admin.sifatsurats.index'));
        }

        return view('admin.sifatsurats.edit')->with('sifatsurat', $sifatsurat);
    }

    /**
     * Update the specified Sifatsurat in storage.
     *
     * @param  int              $id
     * @param UpdateSifatsuratRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSifatsuratRequest $request)
    {
        $sifatsurat = $this->sifatsuratRepository->findWithoutFail($id);

        if (empty($sifatsurat)) {
            Flash::error('Sifatsurat not found');

            return redirect(route('admin.sifatsurats.index'));
        }

        $sifatsurat = $this->sifatsuratRepository->update($request->all(), $id);

        Flash::success('Sifatsurat updated successfully.');

        return redirect(route('admin.sifatsurats.index'));
    }

    /**
     * Remove the specified Sifatsurat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sifatsurat = $this->sifatsuratRepository->findWithoutFail($id);

        if (empty($sifatsurat)) {
            Flash::error('Sifatsurat not found');

            return redirect(route('admin.sifatsurats.index'));
        }

        $this->sifatsuratRepository->delete($id);

        Flash::success('Sifatsurat deleted successfully.');

        return redirect(route('admin.sifatsurats.index'));
    }
}
