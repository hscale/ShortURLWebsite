<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLinksRequest;
use App\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LinksController extends Controller {
    public function index(){
        $links = Link::latest('created_at')->get();

        return view('links.index')->with('links', $links);
    }
    public function createLink()
    {
        return view('links.form');
    }

    /**
     *Save URL to the database
     * @param CreateLinksRequest $request
     * @return Redirect
     */
    public function storeLink(CreateLinksRequest $request)
    {
        $input = $request->all();
    //verify if db has the url

        //generate hash code
        $newHash = Str::random(6);
        $input['hash'] = $newHash;
        $urls = $input['url'];
        // This will check if the url is already exist in the database
        $newUrl = DB::table('links')
            ->where('url', '=', $urls)->get();
        // If The url is exist in teh database an execption will be thrown
        if($newUrl){
            Session::flash('flash_messsage', 'The url is already taken. pls look at the list below');
            // its not possible to put HTML content in secesson thats why i have removed to show the old created record.
            // alternately we can reedirect to page with form and show the errors.
            return redirect('links');
        }else{
            // record will be send to the database

            Link::create($input);
            Session::flash('flash_messsage', 'Your URL is successfully updated with new hash code!');
            return redirect('links');
        }

    }

    public function shortUrl($hash)
    {
        //First we check if the hash is from a URL from our
        //database
        $link = Link::where('hash','=',$hash)
            ->first();
        //If found, we redirect to the URL
        if($link) {
            return redirect($link->url);
            //If not found, we redirect to index page with error
            //message
        } else {return redirect('links/form')
            ->with('message','Invalid Link');
        }
    }

}
