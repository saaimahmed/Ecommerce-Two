<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    protected $brand;
    protected $delete;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Brand.brand-manage',[
            'brands' => Brand::latest('id')->get(),
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
        Brand::CreateAndUpdateCategory($request);
        Alert::alert()->success('Brand Created Successfully','We have Added Brand to the All Categories');
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->brand = Brand::find($id);
        $this->brand->status = $this->brand->status == 1 ? 0 : 1 ;
        $this->brand->save();
        if ($this->brand->status == 1)
        {
            Alert::info('Active','Brand Status Active');
            return redirect()->back();
        }
        else
        {
            Alert::warning('Deactive','Brand Status Deactive');
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
        return  view('Backend.Brand.edit',[
            'brand' => Brand::find($id),
        ]);
    }
    public function view($id)
    {

        return view('Backend.Brand.view',[
            'brand' => Brand::find($id),
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

        Brand::CreateAndUpdateCategory($request,$id);
        Alert::alert()->success('Brand Updated Successfully','We have updated Brand to the All Categories');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->delete = Brand::find($id);
        if (file_exists($this->delete->image))
        {
            unlink($this->delete->image);
        }
        $this->delete->delete();
        Alert::alert()->error('Brand Delete Successfully','We have Delete Brand to the All Categories');
        return redirect()->back();
    }
}
