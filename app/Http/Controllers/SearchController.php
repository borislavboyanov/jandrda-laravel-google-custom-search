<?php

namespace App\Http\Controllers;
use App\Result;

use Illuminate\Http\Request;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;

class SearchController extends Controller
{
    public function search() {
      $fulltext = new LaravelGoogleCustomSearchEngine();

      $fulltext->setEngineId('014058479932776350357:2st9ktghynh');
      $fulltext->setApiKey('AIzaSyDd6e5WxJ4Ml1I9xFSyLmuiyvtvWXeag1o');

      $results = $fulltext->getResults('Donald Trump');

      foreach ($results as $result) {
        $resultToJSON = json_decode(json_encode($result, true));
        $resultForInsert = Result::create(['kind' => $resultToJSON->kind, 'title' => $resultToJSON->title,
        'link' => $resultToJSON->link, 'snippet' => $resultToJSON->snippet, 'formattedUrl' => $resultToJSON->formattedUrl]);
        $resultForInsert->save();
      }

      return view('search', ['results' => $results]);
    }
}
