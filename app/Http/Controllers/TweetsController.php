<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweets;
use Illuminate\Support\Facades\Validator;

class TweetsController extends Controller
{
    public function view() {
        return view('home');
    }

    public function store(Request $request) {
        // return $request->all();
        $validatedData = Validator::make($request->all(),[
            'isi_posting' => 'required|max:250',
            'gambar_posting' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        // Cek validasi fails atau tidak
        // if($validatedData ->fails()){
        //     return $validatedData->messages();
        // }
        if($request->hasFile('gambar_posting')) {
            global $namaFile;
            $file = $request->file('gambar_posting');
            $extension = $file->getClientOriginalExtension();
            $namaFile = uniqid().'.'.$extension;
            $file->move('storage/tweet/', $namaFile);
        }
        if($request->hasFile('file_posting')) {
            global $fileTweet;
            $file = $request->file('file_posting');
            $extension = $file->getClientOriginalExtension();
            $fileTweet = uniqid().'.'.$extension;
            $file->move('storage/tweet/', $fileTweet);
        }

        // return $request->isi_posting;

        $tweet = new Tweets;
        $tweet->isi_posting = $request->isi_posting;

        if($request->gambar_posting != null) {
            $gambarFile = $namaFile;
        }
        if($request->file_posting != null) {
            $filePosting = $fileTweet;
        }

        $tweet->gambar_posting = $gambarFile;
        $tweet->file_posting = $filePosting;
        $tweet->save();
        $tweet->id;
        // return $tweet;

        return redirect()->route('home')->with('success','Tweet anda berhasil dipost!');
   }

   public function create() {
       return view('home')->with('success', 'Tweet berhasil dipost!');
   }

   public function delete($id) {
       Tweets::where('id',$id)->delete();
       return redirect()->route('home')->with('success','Tweet anda berhasil dihapus!');
   }
}
