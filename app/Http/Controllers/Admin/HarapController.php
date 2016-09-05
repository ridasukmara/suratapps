<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateHarapRequest;
use App\Http\Requests\Admin\UpdateHarapRequest;
use App\Repositories\Admin\HarapRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HarapController extends InfyOmBaseController
{
    /** @var  HarapRepository */
    private $harapRepository;

    public function __construct(HarapRepository $harapRepo)
    {
        $this->harapRepository = $harapRepo;
    }

    /**
     * Display a listing of the Harap.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->harapRepository->pushCriteria(new RequestCriteria($request));
        $haraps = $this->harapRepository->all();

        return view('admin.haraps.index')
            ->with('haraps', $haraps);
    }

    /**
     * Show the form for creating a new Harap.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.haraps.create');
    }

    /**
     * Store a newly created Harap in storage.
     *
     * @param CreateHarapRequest $request
     *
     * @return Response
     */
    public function store(CreateHarapRequest $request)
    {
        $input = $request->all();

        $harap = $this->harapRepository->create($input);

        Flash::success('Harap saved successfully.');

        return redirect(route('admin.haraps.index'));
    }

    /**
     * Display the specified Harap.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $harap = $this->harapRepository->findWithoutFail($id);

        if (empty($harap)) {
            Flash::error('Harap not found');

            return redirect(route('admin.haraps.index'));
        }

        return view('admin.haraps.show')->with('harap', $harap);
    }

    /**
     * Show the form for editing the specified Harap.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $harap = $this->harapRepository->findWithoutFail($id);

        if (empty($harap)) {
            Flash::error('Harap not found');

            return redirect(route('admin.haraps.index'));
        }

        return view('admin.haraps.edit')->with('harap', $harap);
    }

    /**
     * Update the specified Harap in storage.
     *
     * @param  int              $id
     * @param UpdateHarapRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHarapRequest $request)
    {
        $harap = $this->harapRepository->findWithoutFail($id);

        if (empty($harap)) {
            Flash::error('Harap not found');

            return redirect(route('admin.haraps.index'));
        }

        $harap = $this->harapRepository->update($request->all(), $id);

        Flash::success('Harap updated successfully.');

        return redirect(route('admin.haraps.index'));
    }

    /**
     * Remove the specified Harap from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $harap = $this->harapRepository->findWithoutFail($id);

        if (empty($harap)) {
            Flash::error('Harap not found');

            return redirect(route('admin.haraps.index'));
        }

        $this->harapRepository->delete($id);

        Flash::success('Harap deleted successfully.');

        return redirect(route('admin.haraps.index'));
    }
}
