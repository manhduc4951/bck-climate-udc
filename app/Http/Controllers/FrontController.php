<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Categories;
use App\PhotosCategories;
use App\Votes;
use App\References;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public static $HOMEPAGE_ID = 1;

    public static $BUILD_ENVIRONMENT_ID = 2;

    public static $RENEWABLE_ENERGY_ID = 3;

    public static $IMPACT_ON_HEALTH_ID = 4;

    public static $CLIMATE_CHANGE_ID = 5;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videoEmbedLink = $this->findCategoryVideoEmbedLink(self::$HOMEPAGE_ID);
        $votes = Votes::all();
        return view('front.homepage',compact('votes','videoEmbedLink'));
    }

    public function buildEnvironment()
    {
        $videoEmbedLink = $this->findCategoryVideoEmbedLink(self::$BUILD_ENVIRONMENT_ID);
        return view('front.built-environment',compact('videoEmbedLink'));
    }

    public function renewableEnergy()
    {
        $videoEmbedLink = $this->findCategoryVideoEmbedLink(self::$RENEWABLE_ENERGY_ID);
        return view('front.renewable-energy',compact('videoEmbedLink'));
    }

    public function impactOnHealth()
    {
        $videoEmbedLink = $this->findCategoryVideoEmbedLink(self::$IMPACT_ON_HEALTH_ID);
        return view('front.impact-on-health',compact('videoEmbedLink'));
    }

    public function climateChange()
    {
        $videoEmbedLink = $this->findCategoryVideoEmbedLink(self::$CLIMATE_CHANGE_ID);
        return view('front.climate-change',compact('videoEmbedLink'));
    }

    public function photos()
    {
        $photosCategories = PhotosCategories::all();
        return view('front.photos',compact('photosCategories'));
    }

    public function references()
    {
        $references = References::firstOrFail();
        return view('front.references',compact('references'));
    }

    /*
     * Find the embed link for a specific category (showing front side)
     * */
    public function findCategoryVideoEmbedLink($categoryID)
    {
        $category = Categories::findOrFail($categoryID);
        $videoEmbedLink = '';
        if($category->video_embed_link) {
            $videoEmbedLink = $category->video_embed_link;
        }
        return $videoEmbedLink;
    }

    /*
     * Vote function from homepage
     * */
    public function voteAjax(Request $request)
    {
        $voteID = $request->get('vote_id');
        $vote = Votes::findOrFail($voteID);
        if($vote) {
            $vote->count = $vote->count + 1;
            $vote->save();
        }

        //Return resull
        $votes = Votes::all();
        $data = [];
        $totalCount = 0;
        if(!$votes->isEmpty()) {
            foreach($votes as $vote) {
                $totalCount += $vote->count;
            }
        }
        $result = "";
        foreach($votes as $vote) {
            $percent = ($vote->count / $totalCount) * 100;
            $percent = intval($percent);
            $result .= $vote->description .
                       "<div class='progress'>" .
                       "<div class='progress-bar' role='progressbar' aria-valuenow='".$percent."'".
                       "aria-valuemin='0' aria-valuemax='100' style='width:".$percent."%'>".
                       "".$percent."%".
                       "</div></div>";
        }
        //$result = "<div class='panel-body'>". "<h2>Climate Change is</h2>" . $result . "</div>";


        echo json_encode($result);

    }

    /*
     * Using for "Result" function of the poll (does not require Vote to see result)
     * */
    public function voteResultAjax()
    {
        $votes = Votes::all();
        $data = [];
        $totalCount = 0;
        if(!$votes->isEmpty()) {
            foreach($votes as $vote) {
                $totalCount += $vote->count;
            }
        }
        $result = "";
        foreach($votes as $vote) {
            $percent = ($vote->count / $totalCount) * 100;
            $percent = intval($percent);
            $result .= $vote->description .
                "<div class='progress'>" .
                "<div class='progress-bar' role='progressbar' aria-valuenow='".$percent."'".
                "aria-valuemin='0' aria-valuemax='100' style='width:".$percent."%'>".
                "".$percent."%".
                "</div></div>";
        }
        //$result = "<div class='panel-body'>". "<h2>Climate Change is</h2>" . $result . "</div>";


        echo json_encode($result);

    }
}
