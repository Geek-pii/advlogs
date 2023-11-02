<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\GetAQuoteRepository;
use App\Models\Message;
use App\Models\Info;
class GetAQuoteController extends Controller
{
    protected $get_a_quote;

    public function __construct(GetAQuoteRepository $get_a_quote)
    {
        $this->get_a_quote = $get_a_quote;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_get_a_quote.title'));

        return view('admin.get_a_quote.index');
    }

    public function datatable()
    {
        $data = $this->get_a_quote->datatable();

        return DataTables::of($data)
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.parts.table_button')->with(
                        [
                            'link_edit' => route('admin.get.a.quote.edit', $data->id),
                            'link_delete' => route('admin.get.a.quote.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_get_a_quote.edit'));

        $get_a_quote = $this->get_a_quote->findOrFail($id);

        return view(
            'admin.get_a_quote.create_edit',
            compact(
                'get_a_quote'
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

        $this->get_a_quote->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_get_a_quote.get_a_quote')]));

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
        $this->get_a_quote->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_get_a_quote.get_a_quote')]));

        return redirect()->back();
    }
    public function success_message(){
        $msg = Message::first();
        return view('admin.get_a_quote.success-message',compact('msg'));
    }
    public function edit_message($id){
        $id = decrypt($id);
        $msg = Message::find($id);
        return view('admin.get_a_quote.edit-message',compact('msg'));
    }
    public function update_message(Request $request, $id){
        $id = decrypt($id);
        $msg = Message::find($id);
        $msg->message=$request->message;
        $msg->save();
        return redirect('admin/success-message');

    }
    public function info(){
        $info = Info::first();
        return view('admin.get_a_quote.info',compact('info'));
    }
    public function edit_info($id){
        $id = decrypt($id);
        $info = Info::find($id);
        return view('admin.get_a_quote.edit-info',compact('info'));
    }
    public function update_info(Request $request, $id){
        $id = decrypt($id);
        $info = Info::find($id);
        $info->name=$request->name;
        $info->type=$request->type;
        $info->run=$request->run;
        $info->speed=$request->speed;
        $info->rolls=$request->rolls;
        $info->modification=$request->modification;
        $info->save();
        return redirect('admin/info');

    }
}
