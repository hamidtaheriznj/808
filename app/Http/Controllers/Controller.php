<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\bookmark;
use App\user;



use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function showbookmarks($id){



       $bookmarks= bookmark::where('user_id',$id)->get();
       
       return view('userbookmarks',compact('bookmarks'));

    }



    public function setbookmark(Request $request){ 
        $data_id = $request['id'];
        $user_id=Auth::id();
        $hasbookmark= bookmark::where('nid',$data_id)->where('user_id',$user_id)->first();
     
        if(!$hasbookmark){
            $bookmark = new bookmark;
            $bookmark->nid = $data_id;
            $bookmark->user_id = $user_id;
            $bookmark->save();
            return 'Bookmarks added';
     } elseif($hasbookmark){
            return 'Bookmarks have already been added';
        }
           
        
     


    }
    public function unsetbookmark(Request $request){ 
        $data_id = $request['id'];
        $user_id=Auth::id();
        $isbookmark= bookmark::where('nid',$data_id)->where('user_id',$user_id)->delete();
      
        if($isbookmark){
 
            return 'Bookmarks deleted';
        }
            return 'Bookmarks are not there';
        

    }
   
    
}
