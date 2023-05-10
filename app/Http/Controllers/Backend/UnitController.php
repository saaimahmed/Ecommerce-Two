<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $unit;
    protected $delete;
    public function index()
    {
        return view('Backend.unit.unit-manage',[
            'units' => Unit::latest('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Unit::CreateAndUpdateCategory($request);
        Alert::alert()->success('Unit Created Successfully','We have Added Unit to the All Units');
        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->unit = Unit::find($id);


        $this->unit->status = $this->unit->status == 1 ? 0 : 1 ;
        $this->unit->save();
        if ($this->unit->status == 1)
        {
            Alert::info('Active','Unit Status Active');
            return redirect()->back();
        }
        else
        {
            Alert::warning('Deactive','Unit Status Deactive');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Backend.unit.edit',[
            'unit' => Unit::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       Unit::CreateAndUpdateCategory($request,$id);
        Alert::alert()->success('Unit Updated Successfully','We have updated Unit to the All Units');
        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->delete = Unit::find($id);
        if (file_exists($this->delete->image))
        {
            unlink($this->delete->image);
        }
        $this->delete->delete();
        Alert::alert()->error('Brand Delete Successfully','We have Delete Brand to the All Categories');
        return redirect()->back();
    }
}
