<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PPCCreateRequest;
use App\Http\Requests\PPCUpdateRequest;
use App\Repositories\PPCRepository;
use App\Validators\PPCValidator;


class PPCsController extends Controller
{

    /**
     * @var PPCRepository
     */
    protected $repository;

    /**
     * @var PPCValidator
     */
    protected $validator;

    public function __construct(PPCRepository $repository, PPCValidator $validator)
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
        $pPCs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pPCs,
            ]);
        }
        return $pPCs;
        //return view('pPCs.index', compact('pPCs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PPCCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PPCCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $pPC = $this->repository->create($request->all());

            $response = [
                'message' => 'PPC created.',
                'data'    => $pPC->toArray(),
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
        $pPC = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pPC,
            ]);
        }

        return view('pPCs.show', compact('pPC'));
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

        $pPC = $this->repository->find($id);

        return view('pPCs.edit', compact('pPC'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PPCUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PPCUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pPC = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'PPC updated.',
                'data'    => $pPC->toArray(),
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
                'message' => 'PPC deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PPC deleted.');
    }
}
