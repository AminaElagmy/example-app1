<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
   //Actions
   public function index (){

    //$categories= DB::table ('categories')->get();
    $categories=category::get();

    $flashMessage= session('success',false);
    $flashMessage= Session::get('success',false);
    $flashMessage= session()->get('success',false);
    //Session::forget('success');  flash مش ال  put بنستخدمها لما ندخل احنا قيمه في السيشن عن طريق ال 
    $title='Categories';
    return view ('categories.index',[
        'categories'=> $categories,
        'title' => 'Categories',
        'flashMessage'=> $flashMessage]);

        //return __METHOD__;
    //return view ('categories',compact('categories','title'));

    /* return view ('categories',[
         'categories'=> $entries,
         'title' => 'Categories'
     ]);*/

    //return $entries->first();
    //dd($entries[0]); 
    //dd($entries);
    //return Response()->json($user);
   }
    public function show ($id){
       //$category= DB::table('categories')->where('id','=',$id)->first();
       //$category= category::where('id','=',$id)->firstOrFail();
       $category= category::findOrFail($id);

    //    if($category==null){
    //     abort(404);
    //   }
      return view('categories.show',[
        'category'=> $category]);
       //dd($category);
       //return $category;
      //return $id;

    }
    public function create (){
        return view('categories.create');
    }
    public function store (Request $request){
     $category= new category();
     $category->name=$request->input('name');
     $category->discription=$request->input('discription');
     $category->parent_id=$request->input('parent_id');
     $category->slug=Str::slug($category->name);
     $category->save();//يعني احفظ البيانات دي في الداتابييز
     return redirect('/categories')-> with('success','Category Created!');
   
     //     dd(
     //      $request->name,// دي وباقي الطرق بتجيب الداتا من البوست الأول ولما مش بتلاقيها بتروح للبودي
     //      $request->input('name'),
     //      $request->post('name'),// bodyفي ال post dataلها استخدام خاص علشان بتجيب الحقل من ال 
     //      $request->get('name'),
     //      $request['name'],
     //      $request->query('name'));//urlاللي بتكون في ال query dataبتجيب الحقل من ال 
     }

    public function edit($id){
        $category = category::findOrFail($id);
        return view('categories.edit',compact('category'));
    }
    public function update (Request $request , $id){
        $category = category::findOrFail($id);
        $category->name=$request->input('name');
        $category->discription=$request->input('discription');
        $category->parent_id=$request->input('parent_id');
        $category->slug=Str::slug($category->name);
        $category->save();//يعني احفظ البيانات دي في الداتابييز
     
     return redirect('/categories')-> with('success','Category Updated!');
    }
    public function destroy ($id){

    //     DB::table('categories')->where('id',$id)->delete();
    //    category::where('id',$id)->delete();

    //    $category = category::findOrFail($id);
    //    $category->delete();

       category::destroy($id);
       Session::flash('success','Category Deleted!');
    // session()->flash('success','Category Deleted!');
    //Session::put('success','Category Deleted!'); احنا اللي دخلنا قيمة السيشن بنفسنا علشان كده لازم نعمله تجاهل فوق
        return redirect('/categories');
       //with('success','Category Deleted!');
    }
}
