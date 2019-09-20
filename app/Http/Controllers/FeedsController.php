<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feeds;
use League\Flysystem\Config;

class FeedsController extends Controller
{
    //load page
    public function index(Request $request){
        $numberPage = config('constant.pageRows');
        if ($category = $request->get('category', '')) {
            $feeds = Feeds::where('category', 'LIKES', '%'.$category.'%')->paginate($numberPage);
        } else {
            $feeds = Feeds::paginate($numberPage);
        }
        return view('feeds.index',compact('feeds'));
    }

    public function create(){
        return view('feeds.create');
    }

    public function getFeedById(Request $request){
        $id = $request->id;
        $feed = Feeds::find($id);
        return view('feeds.update',compact('feed'));
    }

    public function storeFeeds(){
        Feeds::create(
            [
                'title' => request('title'),
                'category' => request('category'),
            ]
        );
        return redirect('/feeds');
    }

    public function updateFeeds(){
        $id = request('id');
        $feed = Feeds::find($id);
        $feed->title = \request('title');
        $feed->category = \request('category');
        $feed->save();
        return redirect('/feeds');
    }

    public function deleteFeeds(Request $request){
        $id = $request->get('id', 0);
        if (empty($id)) {
            return response()->json(['code' => 'failed']);
        }
        $feed = Feeds::find($id);
        $feed->delete();
        return response()->json(['success'=> $request->all()]);
    }
}
