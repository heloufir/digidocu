<?php

namespace App\Http\Controllers;

use App\DataTables\TransitionDataTable;
use App\Http\Requests\CreateTransitionRequest;
use App\Http\Requests\UpdateTransitionRequest;
use App\Repositories\TransitionRepository;
use App\Status;
use App\Transition;
use Flash;
use Illuminate\Support\Arr;
use Response;

class TransitionController extends AppBaseController
{
    /** @var  TransitionRepository */
    private $transitionRepository;

    public function __construct(TransitionRepository $transitionRepo)
    {
        $this->transitionRepository = $transitionRepo;
    }

    /**
     * Display a listing of the Transition.
     *
     * @param TransitionDataTable $transitionDataTable
     * @return Response
     */
    public function index(TransitionDataTable $transitionDataTable)
    {
        $this->isSuperAdmin();
        return $transitionDataTable->render('transitions.index');
    }

    /**
     * Show the form for creating a new Transition.
     *
     * @return Response
     */
    public function create()
    {
        $this->isSuperAdmin();
        $transition = new Transition();
        $statuses = Status::all();
        $statuses->prepend(null);
        return view('transitions.create', compact('statuses', 'transition'));
    }

    /**
     * Store a newly created Transition in storage.
     *
     * @param CreateTransitionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransitionRequest $request)
    {
        $this->isSuperAdmin();
        $input = $request->all();

        $transition = $this->transitionRepository->create($input);

        Flash::success('Transition saved successfully.');

        return redirect(route('transitions.index'));
    }

    /**
     * Display the specified Transition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->isSuperAdmin();
        $transition = $this->transitionRepository->find($id);

        if (empty($transition)) {
            Flash::error('Transition not found');

            return redirect(route('transitions.index'));
        }

        return view('transitions.show')->with('transition', $transition);
    }

    /**
     * Show the form for editing the specified Transition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->isSuperAdmin();
        $statuses = Status::all();
        $statuses->prepend(null);
        $transition = $this->transitionRepository->find($id);

        if (empty($transition)) {
            Flash::error('Transition not found');

            return redirect(route('transitions.index'));
        }

        return view('transitions.edit', compact('transition', 'statuses'));
    }

    /**
     * Update the specified Transition in storage.
     *
     * @param int $id
     * @param UpdateTransitionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransitionRequest $request)
    {
        $this->isSuperAdmin();
        $transition = $this->transitionRepository->find($id);

        if (empty($transition)) {
            Flash::error('Transition not found');

            return redirect(route('transitions.index'));
        }

        $data = $request->all();
        $transition = $this->transitionRepository->update($data, $id);

        Flash::success('Transition updated successfully.');

        return redirect(route('transitions.index'));
    }

    /**
     * Remove the specified Transition from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->isSuperAdmin();
        $transition = $this->transitionRepository->find($id);

        if (empty($transition)) {
            Flash::error('Transition not found');

            return redirect(route('transitions.index'));
        }

        $this->transitionRepository->delete($id);

        Flash::success('Transition deleted successfully.');

        return redirect(route('transitions.index'));
    }
}
