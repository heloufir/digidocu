<?php

namespace App\Http\Controllers;

use App\DataTables\StatusDataTable;
use App\Http\Requests\CreateStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Repositories\StatusRepository;
use App\Status;
use Flash;
use Illuminate\Support\Arr;
use Response;

class StatusController extends AppBaseController
{
    /** @var  StatusRepository */
    private $statusRepository;

    public function __construct(StatusRepository $statusRepo)
    {
        $this->statusRepository = $statusRepo;
    }

    /**
     * Display a listing of the Status.
     *
     * @param StatusDataTable $statusDataTable
     * @return Response
     */
    public function index(StatusDataTable $statusDataTable)
    {
        $this->isSuperAdmin();
        return $statusDataTable->render('statuses.index');
    }

    /**
     * Show the form for creating a new Status.
     *
     * @return Response
     */
    public function create()
    {
        $this->isSuperAdmin();
        $status = new Status();
        return view('statuses.create', compact('status'));
    }

    /**
     * Store a newly created Status in storage.
     *
     * @param CreateStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusRequest $request)
    {
        $this->isSuperAdmin();
        $input = $request->all();

        $status = $this->statusRepository->create($input);

        Flash::success('Status saved successfully.');

        return redirect(route('statuses.index'));
    }

    /**
     * Display the specified Status.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->isSuperAdmin();
        $status = $this->statusRepository->find($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('statuses.index'));
        }

        return view('statuses.show')->with('status', $status);
    }

    /**
     * Show the form for editing the specified Status.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->isSuperAdmin();
        $status = $this->statusRepository->find($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('statuses.index'));
        }

        return view('statuses.edit', compact('status'));
    }

    /**
     * Update the specified Status in storage.
     *
     * @param int $id
     * @param UpdateStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusRequest $request)
    {
        $this->isSuperAdmin();
        $status = $this->statusRepository->find($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('statuses.index'));
        }

        $data = $request->all();
        $status = $this->statusRepository->update($data, $id);

        Flash::success('Status updated successfully.');

        return redirect(route('statuses.index'));
    }

    /**
     * Remove the specified Status from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->isSuperAdmin();
        $status = $this->statusRepository->find($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('statuses.index'));
        }

        $this->statusRepository->delete($id);

        Flash::success('Status deleted successfully.');

        return redirect(route('statuses.index'));
    }
}
