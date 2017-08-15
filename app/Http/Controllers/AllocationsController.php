<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AllocationCreateRequest;
use App\Http\Requests\AllocationUpdateRequest;
use App\Repositories\AllocationRepository;
use App\Validators\AllocationValidator;


class AllocationsController extends Controller
{

    /**
     * @var AllocationRepository
     */
    protected $repository;

    /**
     * @var AllocationValidator
     */
    protected $validator;

    public function __construct(AllocationRepository $repository, AllocationValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $allocations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $allocations,
            ]);
        }
        return $allocations;
        //return view('allocations.index', compact('allocations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AllocationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AllocationCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $allocation = $this->repository->create($request->all());

            $response = [
                'message' => 'Allocation created.',
                'data'    => $allocation->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allocation = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $allocation,
            ]);
        }

        return view('allocations.show', compact('allocation'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $allocation = $this->repository->find($id);

        return view('allocations.edit', compact('allocation'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AllocationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AllocationUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $allocation = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Allocation updated.',
                'data'    => $allocation->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Allocation deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Allocation deleted.');
    }
}
