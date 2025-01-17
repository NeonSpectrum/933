<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Author;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller {
  /**
   * @return mixed
   */
  public function __construct() {
    return $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return Article::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $validator = Validator::make($request->all(), [
      'image' => 'image'
    ]);

    if ($validator->fails()) {
      return response()->json(['success' => false, 'error' => 'Invalid Image Format.']);
    }

    $filename  = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
    $extension = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
    $article   = new Article;
    $article->author()->associate(Author::find($request->author_id));
    $article->fill($request->only(['title', 'type', 'date', 'content']));

    $article->filename = uniqid($filename . '-') . '.' . $extension;
    $request->image->move(public_path('uploads'), $article->filename);

    if ($article->save()) {
      $tags = explode('\n', $request->tags);
      foreach ($tags as $value) {
        $tag = new Tag;
        $tag->article()->associate($article);
        $tag->content = $value;
        $tag->save();
      }
      return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'error' => 'There was an error adding the record.']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    return Article::firstOrFail($id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    if ($request->image) {
      $validator = Validator::make($request->all(), [
        'image' => 'image'
      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'error' => 'Invalid Image Format.']);
      }

      $filename  = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
      $extension = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
    }
    $article = Article::find($id);

    $article->author()->associate(Author::find($request->author_id));

    $article->fill($request->only(['title', 'type', 'content', 'date']));
    if (isset($filename)) {
      $article->filename = uniqid($filename . '-') . '.' . $extension;
      $request->image->move(public_path('uploads'), $article->filename);
    }

    if ($article->save()) {
      return response()->json(['success' => true]);
    } else {
      return response()->json(['success' => false, 'error' => 'There was an error updating the record.']);
    }
  }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
  public function destroy($id) {
    $article = Article::find($id);

    if ($article->delete()) {
      return response()->json(['success' => true]);
    } else {
      return response()->json(['success' => false, 'error' => 'There was an error deleting the record.']);
    }
  }
};
