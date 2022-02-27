<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store()
    {
        request()->validate([
            'name'=>'required',
        ]);

        Category::create([
           'name'=>request('name'),
            'slug'=>Str::lower(request('name')),
        ]);
        return back();
    }
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.index',['categories'=>$categories]);
    }
    public function edit(Category $category)
    {
        return view('admin.categories.edit',['category'=>$category]);
    }
    public function update(Category $category)
    {
        request()->validate([
            'name'=>'required',
        ]);

        $category->name=request('name');
        $category->slug=Str::lower(request('name'));
        $category->update();
        return redirect()->route('category.index');
    }
    public function destroy(Category $category)
    {
        $posts=Post::all();
        foreach($posts as $post)
        {
         if($category->posts()->count()==0)
            {
            $category->delete();
            Session::flash('category-deleted-message','Kategorija je uspješno obrisana.');
            return back();
            }
        else
            {
                Session::flash('message','Kategorija se ne može obrisati.');
                return back();
            }
        }
    }
}
