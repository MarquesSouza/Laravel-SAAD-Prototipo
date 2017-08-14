<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ModalityCreateRequest;
use App\Http\Requests\ModalityUpdateRequest;
use App\Repositories\ModalityRepository;
use App\Validators\ModalityValidator;


class ModalitiesController extends Controller
{

    /**
     * @var ModalityRepository
     */
    protected $repository;

    /**
     * @var ModalityValidator
     */
    protected $validator;

    public function __construct(ModalityRepository $repository, ModalityValidator $validator)
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
        $modalities = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $modalities,
            ]);
        }

        return view('modalities.index', compact('modalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ModalityCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ModalityCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $modality = $this->repository->create($request->all());

            $response = [
                'message' => 'Modality created.',
                'data'    => $modality->toArray(),
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
        $modality = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $modality,
            ]);
        }

        return view('modalities.show', compact('modality'));
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

        $modality = $this->repository->find($id);

        return view('modalities.edit', compact('modality'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ModalityUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ModalityUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $modality = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Modality updated.',
                'data'    => $modality->toArray(),
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
                'message' => 'Modality deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Modality deleted.');
    }
}
