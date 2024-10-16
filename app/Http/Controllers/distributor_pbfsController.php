<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdistributor_pbfsRequest;
use App\Http\Requests\Updatedistributor_pbfsRequest;
use App\Repositories\distributor_pbfsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class distributor_pbfsController extends AppBaseController
{
    /** @var  distributor_pbfsRepository */
    private $distributorPbfsRepository;

    public function __construct(distributor_pbfsRepository $distributorPbfsRepo)
    {
        $this->distributorPbfsRepository = $distributorPbfsRepo;
    }

    /**
     * Display a listing of the distributor_pbfs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $distributorPbfs = $this->distributorPbfsRepository->all();

        return view('distributor_pbfs.index')
            ->with('distributorPbfs', $distributorPbfs);
    }

    /**
     * Show the form for creating a new distributor_pbfs.
     *
     * @return Response
     */
    public function create()
    {
        return view('distributor_pbfs.create');
    }

    /**
     * Store a newly created distributor_pbfs in storage.
     *
     * @param Createdistributor_pbfsRequest $request
     *
     * @return Response
     */
    public function store(Createdistributor_pbfsRequest $request)
    {
        $input = $request->all();

        $distributorPbfs = $this->distributorPbfsRepository->create($input);

        Flash::success('Distributor Pbfs saved successfully.');

        return redirect(route('distributorPbfs.index'));
    }

    /**
     * Display the specified distributor_pbfs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distributorPbfs = $this->distributorPbfsRepository->find($id);

        if (empty($distributorPbfs)) {
            Flash::error('Distributor Pbfs not found');

            return redirect(route('distributorPbfs.index'));
        }

        return view('distributor_pbfs.show')->with('distributorPbfs', $distributorPbfs);
    }

    /**
     * Show the form for editing the specified distributor_pbfs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distributorPbfs = $this->distributorPbfsRepository->find($id);

        if (empty($distributorPbfs)) {
            Flash::error('Distributor Pbfs not found');

            return redirect(route('distributorPbfs.index'));
        }

        return view('distributor_pbfs.edit')->with('distributorPbfs', $distributorPbfs);
    }

    /**
     * Update the specified distributor_pbfs in storage.
     *
     * @param int $id
     * @param Updatedistributor_pbfsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedistributor_pbfsRequest $request)
    {
        $distributorPbfs = $this->distributorPbfsRepository->find($id);

        if (empty($distributorPbfs)) {
            Flash::error('Distributor Pbfs not found');

            return redirect(route('distributorPbfs.index'));
        }

        $distributorPbfs = $this->distributorPbfsRepository->update($request->all(), $id);

        Flash::success('Distributor Pbfs updated successfully.');

        return redirect(route('distributorPbfs.index'));
    }

    /**
     * Remove the specified distributor_pbfs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distributorPbfs = $this->distributorPbfsRepository->find($id);

        if (empty($distributorPbfs)) {
            Flash::error('Distributor Pbfs not found');

            return redirect(route('distributorPbfs.index'));
        }

        $this->distributorPbfsRepository->delete($id);

        Flash::success('Distributor Pbfs deleted successfully.');

        return redirect(route('distributorPbfs.index'));
    }
}
