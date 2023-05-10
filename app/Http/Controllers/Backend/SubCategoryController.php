<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    protected $subcategory;
    //manage Sub Category


    public function addSubCategory()
    {
        return view('Backend.sub-category.add',[
            'categories' => Category::where('status',1)->get(),
        ]);
    }

    public function createSubCategory(Request $request)
    {
        SubCategory::CreateAndUpdateCategory($request);
        Alert::alert()->success('Sub Category Created Successfully','We have Added Sub Category to the All Categories');
        return redirect()->route('manage-sub-category');

    }
    public function manageSubCategory()
    {
        return view('Backend.sub-category.manage-sub-category',[
            'subcategories' => SubCategory::latest()->get(),

        ]);
    }

    public function editSubCategory($id)
    {
        return view('Backend.sub-category.edit',[
            'categories' => Category::where('status',1)->get(),
            'subcategory' => SubCategory::find($id),
        ]);
    }
    public function updateSubCategory(Request $request, $id)
    {
        SubCategory::CreateAndUpdateCategory($request,$id);
        Alert::alert()->success('Sub Category Updated Successfully','We have updated Sub Category to the All Categories');
        return redirect()->route('manage-sub-category');

    }
    public function deleteSubCategory(Request $request ,$id)
    {
        $this->subcategory = SubCategory::deleteSubCategory($id);
        Alert::alert()->error('Sub Category Delete Successfully','We have Delete Sub Category to the All Categories');
        return redirect()->route('manage-sub-category');

    }
    public function statusSubCategory($id)
    {

        $this->subcategory = SubCategory::find($id);
        $this->subcategory->status = $this->subcategory->status == 1 ? 0 : 1 ;
        $this->subcategory->save();
        if ($this->subcategory->status == 1)
        {
            Alert::info('Active','Category Status Active');
            return redirect()->back();
        }
        else
        {
            Alert::warning('Deactive','Category Status Deactive');
            return redirect()->back();
        }

    }
}
