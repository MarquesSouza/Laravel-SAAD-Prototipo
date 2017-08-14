<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RDCCreateRequest;
use App\Http\Requests\RDCUpdateRequest;
use App\Repositories\RDCRepository;
use App\Validators\RDCValidator;


class RDCsController extends Controller
{

    /**
     * @var RDCRepository
     */
    protected $repository;

    /**
     * @var RDCValidator
     */
    protected $validator;

    public function __construct(RDCRepository $repository, RDCValidator $validator)
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
        $rDCs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $rDCs,
            ]);
        }

        return view('rDCs.index', compact('rDCs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RDCCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RDCCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $rDC = $this->repository->create($request->all());

            $response = [
                'message' => 'RDC created.',
                'data'    => $rDC->toArray(),
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
        $rDC = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $rDC,
            ]);
        }

        return view('rDCs.show', compact('rDC'));
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

        $rDC = $this->repository->find($id);

        return view('rDCs.edit', compact('rDC'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RDCUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(RDCUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $rDC = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'RDC updated.',
                'data'    => $rDC->toArray(),
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
                'message' => 'RDC deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RDC deleted.');
    }
}
