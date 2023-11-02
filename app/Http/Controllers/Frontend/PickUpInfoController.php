<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validators\PickUpInfoValidator;
use App\Repositories\PickUpInfoRepository;
use App\Http\Requests\PickUpInfoCreateRequest;
use App\Http\Requests\PickUpInfoUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class PickUpInfosController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class PickUpInfoController extends Controller
{
    /**
     * @var PickUpInfoRepository
     */
    protected $repository;

    /**
     * @var PickUpInfoValidator
     */
    protected $validator;

    /**
     * PickUpInfosController constructor.
     *
     * @param PickUpInfoRepository $repository
     * @param PickUpInfoValidator $validator
     */
    public function __construct(PickUpInfoRepository $repository, PickUpInfoValidator $validator)
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
        $pickUpInfos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pickUpInfos,
            ]);
        }

        return view('pickUpInfos.index', compact('pickUpInfos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PickUpInfoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $inputs = $request->all();
            $authorizer = auth('account')->user();
            $authorizer->step_progress = 'filled_pickup_information';
            $authorizer->save();
            $inputs['account_id'] = $authorizer->id;
            $pickUpInfo = $this->repository->create($inputs);

            if ($request->wantsJson()) {
                return response()->json($pickUpInfo, 201);
            }

            return redirect()->back()->with('message', 'Pick Up Information Created');
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json(
                    $e->getMessageBag(), 422
                );
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
        $pickUpInfo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pickUpInfo,
            ]);
        }

        return view('pickUpInfos.show', compact('pickUpInfo'));
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
        $pickUpInfo = $this->repository->find($id);

        return view('pickUpInfos.edit', compact('pickUpInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PickUpInfoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pickUpInfo = $this->repository->update($request->all(), $id);

            if ($request->wantsJson()) {

                return response()->json($pickUpInfo, 200);
            }
            return redirect()->back()->with('message', 'Update Pick Up Info Success');
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json($e->getMessageBag(), 422);
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
                'message' => 'PickUpInfo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PickUpInfo deleted.');
    }
}
