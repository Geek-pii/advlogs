<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageBlock;
use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use App\Repositories\ThemeRepository;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    protected $page;
    protected $theme;

    public function __construct(
        PageRepository  $page,
        ThemeRepository $theme
    )
    {
        $this->page = $page;
        $this->theme = $theme;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_page.title'));
        return view('admin.page.index');
    }

    public function datatable()
    {
        $data = $this->page->datatable()->with(['parent']);

        return DataTables::of($data)
            ->addColumn(
                'check',
                function ($data) {
                    return '<input type="checkbox" name="check" value="1" data-id="' . $data->id . '" id="check-' . $data->id . '">
                    <label for="check-' . $data->id . '"></label>';
                }
            )
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->title;
                }
            )
            ->editColumn(
                'theme',
                function ($data) {
                    return implode(' ', array_map('ucfirst', explode('-', $data->theme)));
                }
            )
            ->addColumn(
                'parent',
                function ($data) {
                    return isset($data->parent) ? $data->parent->title : '';
                }
            )
            ->editColumn(
                'active',
                function ($data) {
                    return $data->active != 0 ? '<span class="material-icons">done</span>' : '';
                }
            )
            ->editColumn(
                'created_at',
                function ($data) {
                    return $data->created_at->format('Y-m-d H:i:s');
                }
            )
            ->editColumn(
                'updated_at',
                function ($data) {
                    return $data->updated_at->format('Y-m-d H:i:s');
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.parts.table_button')->with(
                        [
                            'link_edit' => $data->type === 'static_page' ? route('admin.page.static.edit', $data->id) : route('admin.page.edit', $data->id),
                            'link_delete' => route('admin.page.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_page.create'));
        $themes = $this->theme->load(1);
        $block_types = PageBlock::types();
        $parents = $this->page->all();
        return view('admin.page.create_edit', compact('themes', 'block_types', 'parents'));
    }

    public function loadBlock(Request $request)
    {
        $types = $request->get('types');
        // used to load parent blocks
        $page_id = $request->get('page_id');

        $parent_blocks = null;
        if ($page_id) {
            $page = $this->page->find($page_id);
            $parent_blocks = $page->parentBlocks;
        }
        $time = time();
        $name = "blocks[{$time}]";
        return view("admin.page.partials.component.block", compact('name', 'types', 'parent_blocks'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->page->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_page.page')]));

        return redirect()->route('admin.page.index');
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
        Breadcrumb::title(trans('admin_page.edit'));

        $page = $this->page->find($id);

        $metadata = $page->meta;

        $parent_blocks = $page->parentBlocks;

        $themes = $this->theme->load(1);

        $block_types = PageBlock::types();

        $parents = $this->page->all();

        return view(
            'admin.page.create_edit',
            compact(
                'page',
                'metadata',
                'themes',
                'block_types',
                'parent_blocks',
                'parents'
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

        $this->page->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_page.page')]));

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
        $this->page->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_page.page')]));

        return redirect()->back();
    }

    public function deleteMulti(Request $request)
    {
        $this->page->deleteMulti($request->get('array_id'));
    }
}
