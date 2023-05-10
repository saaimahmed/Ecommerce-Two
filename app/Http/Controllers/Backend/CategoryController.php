<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    protected $category;
    protected $status;
    // manage
    public function manageCategory()
    {
        return view('Backend.category.manage',[
            'Categories' => Category::latest('id')->get(),
        ]);
    }

    public function createCategory(Request $request)
    {
        Category::CreateAndUpdateCategory($request);
        Alert::alert()->success('Category Created Successfully','We have Added Category to the All Categories');
        return redirect()->route('manage-category');

    }

    public function editCategory($id)
    {
        return view('Backend.category.edit',[
            'category' => Category::find($id),
        ]);
    }

    public function updateCategory(Request $request,$id)
    {
        Category::CreateAndUpdateCategory($request,$id);
        Alert::alert()->success('Category Updated Successfully','We have updated Category to the All Categories');
        return redirect()->route('manage-category');
    }

    public function deleteCategory($id)
    {
        $this->category =  Category::find($id);
        if (file_exists($this->category->image))
        {
            unlink($this->category->image);
        }
        $this->category->delete();
        Alert::alert()->error('Category Delete Successfully','We have Delete Category to the All Categories');
        return redirect()->route('manage-category');

    }

    public function changeCategory($id)
    {
        $this->category = Category::find($id);

        $this->category->status = $this->category->status == 1 ? 0 : 1 ;
        $this->category->save();
        if ($this->category->status == 1)
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
