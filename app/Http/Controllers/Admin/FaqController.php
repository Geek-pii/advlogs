<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

use App\Repositories\FaqRepository;

class FaqController extends Controller
{
    protected $faq;

    public function __construct(FaqRepository $faq)
    {
        $this->faq = $faq;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_faq.title'));

        return view('admin.faq.index');
    }

    public function datatable()
    {
        $data = $this->faq->datatable()->with([
            'category' => function ($with) {
                $with->with('parent');
            }
        ]);

        return DataTables::of($data)
            ->addColumn(
                'category',
                function ($data) {
                    $category = $data->category->name ?? '';
                    if (isset($data->category) && isset($data->category->parent)) {
                        return $data->category->parent->name . ' > ' . $category;
                    }

                    return $category;
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
                            'link_edit' => route('admin.faq.edit', $data->id),
                            'link_delete' => route('admin.faq.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_faq.create'));

        $faq_categories = FaqCategory::query()->where('level', 0)
            ->orderBy('position')
            ->with('children')
            ->get();

        return view('admin.faq.create_edit', compact('faq_categories'));
    }

    /**
     * Faq a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->faq->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_faq.faq')]));

        return redirect()->route('admin.faq.index');
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
        Breadcrumb::title(trans('admin_faq.edit'));

        $faq = $this->faq->findOrFail($id);

        $faq_categories = FaqCategory::query()->where('level', 0)
            ->orderBy('position')
            ->with('children')
            ->get();

        return view(
            'admin.faq.create_edit',
            compact(
                'faq',
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

        $this->faq->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_faq.faq')]));

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
        $this->faq->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_faq.faq')]));

        return redirect()->back();
    }
}
