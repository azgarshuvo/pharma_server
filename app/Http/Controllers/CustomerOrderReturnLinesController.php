<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CustomerOrderReturnLine;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class CustomerOrderReturnLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
            $data = CustomerOrderReturnLine::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                               $btn = '<div class="btn-group"><a href="'.URL::to('/').'/customer-order-return-lines/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData('.$row->id.')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                                return $btn;
                        })

                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

                   }
     
                    return view('customer-order-return-lines.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('customer-order-return-lines.create');
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
        
        CustomerOrderReturnLine::create($requestData);

        return redirect('customer-order-return-lines')->with('flash_message', 'CustomerOrderReturnLine added!');
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
        $customerorderreturnline = CustomerOrderReturnLine::findOrFail($id);

        return view('customer-order-return-lines.show', compact('customerorderreturnline'));
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
        $customerorderreturnline = CustomerOrderReturnLine::findOrFail($id);

        return view('customer-order-return-lines.edit', compact('customerorderreturnline'));
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
        
        $customerorderreturnline = CustomerOrderReturnLine::findOrFail($id);
        $customerorderreturnline->update($requestData);

        return redirect('customer-order-return-lines')->with('flash_message', 'CustomerOrderReturnLine updated!');
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
        CustomerOrderReturnLine::destroy($id);

        return redirect('customer-order-return-lines')->with('flash_message', 'CustomerOrderReturnLine deleted!');
    }
}
