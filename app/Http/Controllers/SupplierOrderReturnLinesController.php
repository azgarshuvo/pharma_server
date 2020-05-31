<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SupplierOrderReturnLine;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class SupplierOrderReturnLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
            $data = SupplierOrderReturnLine::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/supplier-order-return-lines/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
     
                    return view('supplier-order-return-lines.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('supplier-order-return-lines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'quantity' => 'required|min:1'
		]);
        $requestData = $request->all();
        
        SupplierOrderReturnLine::create($requestData);

        return redirect('supplier-order-return-lines')->with('flash_message', 'SupplierOrderReturnLine added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $supplierorderreturnline = SupplierOrderReturnLine::findOrFail($id);

        return view('supplier-order-return-lines.show', compact('supplierorderreturnline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $supplierorderreturnline = SupplierOrderReturnLine::findOrFail($id);

        return view('supplier-order-return-lines.edit', compact('supplierorderreturnline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'quantity' => 'required|min:1'
		]);
        $requestData = $request->all();
        
        $supplierorderreturnline = SupplierOrderReturnLine::findOrFail($id);
        $supplierorderreturnline->update($requestData);

        return redirect('supplier-order-return-lines')->with('flash_message', 'SupplierOrderReturnLine updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        SupplierOrderReturnLine::destroy($id);

        return redirect('supplier-order-return-lines')->with('flash_message', 'SupplierOrderReturnLine deleted!');
    }
}