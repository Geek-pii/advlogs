<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validators\DeliveryInfoValidator;
use App\Repositories\DeliveryInfoRepository;
use App\Http\Requests\DeliveryInfoCreateRequest;
use App\Http\Requests\DeliveryInfoUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class DeliveryInfosController.
 *
 * @package namespace App\Http\Controllers\Admin;
 */
class DeliveryInfoController extends Controller
{
    /**
     * @var DeliveryInfoRepository
     */
    protected $repository;

    /**
     * @var DeliveryInfoValidator
     */
    protected $validator;

    /**
     * DeliveryInfosController constructor.
     *
     * @param DeliveryInfoRepository $repository
     * @param DeliveryInfoValidator $validator
     */
    public function __construct(DeliveryInfoRepository $repository, DeliveryInfoValidator $validator)
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
        $deliveryInfos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $deliveryInfos,
            ]);
        }

        return view('deliveryInfos.index', compact('deliveryInfos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DeliveryInfoCreateRequest $request
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
            $authorizer->step_progress = 'filled_delivery_information';
            $authorizer->save();
            $inputs['account_id'] = $authorizer->id;
            $deliveryInfo = $this->repository->create($inputs);

            if ($request->wantsJson()) {
                return response()->json($deliveryInfo, 201);
            }

            return redirect()->back()->with('message', 'Delivery Information Created');
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json(
                    $e->getMessageBag(),
                    422
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
        $deliveryInfo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $deliveryInfo,
            ]);
        }

        return view('deliveryInfos.show', compact('deliveryInfo'));
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
        $deliveryInfo = $this->repository->find($id);

        return view('deliveryInfos.edit', compact('deliveryInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DeliveryInfoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DeliveryInfoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $deliveryInfo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'DeliveryInfo updated.',
                'data'    => $deliveryInfo->toArray(),
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
                'message' => 'DeliveryInfo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'DeliveryInfo deleted.');
    }
}
