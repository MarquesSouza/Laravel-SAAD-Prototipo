<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AmbientCreateRequest;
use App\Http\Requests\AmbientUpdateRequest;
use App\Repositories\AmbientRepository;
use App\Validators\AmbientValidator;


class AmbientsController extends Controller
{

    /**
     * @var AmbientRepository
     */
    protected $repository;

    /**
     * @var AmbientValidator
     */
    protected $validator;

    public function __construct(AmbientRepository $repository, AmbientValidator $validator)
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
        $ambients = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ambients,
            ]);
        }
        return $ambients;
       // return view('ambients.index', compact('ambients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AmbientCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AmbientCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ambient = $this->repository->create($request->all());

            $response = [
                'message' => 'Ambient created.',
                'data'    => $ambient->toArray(),
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
        $ambient = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ambient,
            ]);
        }

        return view('ambients.show', compact('ambient'));
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

        $ambient = $this->repository->find($id);

        return view('ambients.edit', compact('ambient'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AmbientUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AmbientUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ambient = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ambient updated.',
                'data'    => $ambient->toArray(),
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
                'message' => 'Ambient deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Ambient deleted.');
    }
}
