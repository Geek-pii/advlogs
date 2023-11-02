<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

use App\Repositories\FaqCategoryRepository;

class FaqCategoryController extends Controller
{
    protected $faq_category;

    public function __construct(FaqCategoryRepository $faq_category)
    {
        $this->faq_category = $faq_category;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_faq_category.title'));

        return view('admin.faq_category.index');
    }

    public function datatable()
    {
        $data = $this->faq_category->datatable()->with('parent');

        return DataTables::of($data)
            ->addColumn(
                'parent',
                function ($data) {
                    return $data->parent->name ?? '';
                }
            )
            ->editColumn(
                'active',
                function ($data) {
                    return $data->active != 0 ? '<span class="material-icons">done</span>' : '';
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.parts.table_button')->with(
                        [
                            'link_edit' => route('admin.faq.category.edit', $data->id),
                            'link_delete' => route('admin.faq.category.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_faq_category.create'));

        $faq_categories = $this->faq_category->datatable()->where('level', 0)->get();

        return view('admin.faq_category.create_edit', compact('faq_categories'));
    }

    /**
     * FaqCategory a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->faq_category->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_faq_category.faq_category')]));

        return redirect()->route('admin.faq.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_faq_category.edit'));

        $faq_category = $this->faq_category->find($id);

        $faq_categories = $this->faq_category->datatable()
            ->where('id', '<>', $faq_category->id)
            ->where('level', 0)
            ->get();

        return view(
            'admin.faq_category.create_edit',
            compact(
                'faq_category',
                'faq_categories'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->faq_category->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_faq_category.faq_category')]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->faq_category->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_faq_category.faq_category')]));

        return redirect()->back();
    }
}
