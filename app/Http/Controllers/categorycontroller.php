<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\service;

class categorycontroller extends Controller
{
    public function main(){
        $categories=category::all();
        $services=service::all();
        return view('main.index',['categories'=>$categories,'services'=>$services]);
    }
    
    public function serviceform(){
        $categories=category::all();
        $services=service::all();
        return view('main.return',['categories'=>$categories,'services'=>$services]);
    }
    public function index(){
        $categories=category::all();
        return view('admin.addcategories',['categories'=>$categories]);
    }
    public function showcategories(){
        $categories=category::all();
        $services=service::all();
        return view('admin.showcategory&services',['categories'=>$categories,'services'=>$services]);
    }
    public function editplayer(){
        
        $players=Player::latest()->paginate(10);

return view('admin.editplayer',['players'=>$players]);
    }
    
    public function addcategory(Request $request){
        $request->validate([
            'category'=>'required'
        ]);
        $category = new category;

        $category->category_name=$request->category;
        
        
        $category->save();
        return redirect('/admin')->withSuccess('New Category Added');
    }
    public function addservice(Request $request){
        $request->validate([
            'service'=>'required'
        ]);
        $service = new service;

        $service->service_name=$request->service;
        $service->category_id=$request->category_list;
        
        
        $service->save();
        return redirect('/admin')->withSuccess1('New Service Added');
    }
    public function editcategory($id){
        $category= category::where('id',$id)->first();
        return view('admin.editcategory',['category'=>$category]);
    }
    public function editservice($id){
        $service= service::where('id',$id)->first();
        $categories=category::all();
        return view('admin.editservice',['service'=>$service,'categories'=>$categories]);
    }

    public function updatecategory(Request $request,$id){
        $request->validate([
            'category'=>'required',
            
            
        ]);
        $category= category::where('id',$id)->first();
         
        $category->category_name=$request->category;
       
        $category->update();
        return redirect('/categories&services');
    }
    public function updateservice(Request $request,$id){
        $request->validate([
            'service'=>'required',
            'category_list'=>'required'
            
            
        ]);
        $service= service::where('id',$id)->first();
         
        $service->service_name=$request->service;
        $service->category_id=$request->category_list;
       
        $service->update();
        return redirect('/categories&services');
    }
    public function categorydelete($id){
        $category= category::where('id',$id)->first();
        $categoryid=$category->id;
        $service=service::where('category_id',$categoryid);

        $category->delete();
        $service->delete();
        return redirect('/categories&services');
    }
    public function servicedelete($id){
        $service= service::where('id',$id)->first();
        

       
        $service->delete();
        return redirect('/categories&services');
    }


    public function showplayers(){
        $players=Player::latest()->paginate(6);
        return view('players.players',['players'=>$players]);
    }
    public function singleplayer($id){
        $player= Player::where('id',$id)->first();
        $events=event::all();
        return view('players.playerdetail',['player'=>$player,'events'=>$events]);
    }
}
