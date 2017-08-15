<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ActivityPCCCreateRequest;
use App\Http\Requests\ActivityPCCUpdateRequest;
use App\Repositories\ActivityPCCRepository;
use App\Validators\ActivityPCCValidator;


class ActivityPCCsController extends Controller
{

    /**
     * @var ActivityPCCRepository
     */
    protected $repository;

    /**
     * @var ActivityPCCValidator
     */
    protected $validator;

    public function __construct(ActivityPCCRepository $repository, ActivityPCCValidator $validator)
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
        $activityPCCs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $activityPCCs,
            ]);
        }
        return $activityPCCs;
        //return view('activityPCCs.index', compact('activityPCCs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ActivityPCCCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityPCCCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $activityPCC = $this->repository->create($request->all());

            $response = [
                'message' => 'ActivityPCC created.',
                'data'    => $activityPCC->toArray(),
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
        $activityPCC = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $activityPCC,
            ]);
        }

        return view('activityPCCs.show', compact('activityPCC'));
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

        $activityPCC = $this->repository->find($id);

        return view('activityPCCs.edit', compact('activityPCC'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ActivityPCCUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ActivityPCCUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $activityPCC = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ActivityPCC updated.',
                'data'    => $activityPCC->toArray(),
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
                'message' => 'ActivityPCC deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ActivityPCC deleted.');
    }
}
