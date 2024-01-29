<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function insertFromAPI()
    {
        $news = json_decode(file_get_contents('https://smb.gov.az/api/kobdostu_news/az/5'), true);

        foreach ($news as $singleNews)
        {
            DB::table('news')->insert(
                [
                    'title'=>$singleNews['title'],
                    'slug'=>$singleNews['slug'],
                    'text'=>$singleNews['text'],
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]
            );
        }

    }

    public function getData() :JsonResponse
    {
        $news = News::latest()->take(5)->get();
        return  response()->json($news);
    }

    public function edit($id){
        return News::find($id);
    }

    public function createData(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required',
            'created_at' => 'required|date',
        ]);

        // If validation fails, return the validation errors
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        // Validation passed, create the News instance
        News::create([
            'title' => $request->title,
            'text' => $request->title, // Corrected from $request->title to $request->text
            'slug' => $request->slug,
            'created_at' => $request->created_at,
        ]);

        return response()->json(['message' => 'Data Has Successfully been created']);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required',
            'created_at' => 'required|date',
        ]);

        // If validation fails, return the validation errors
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        // Validation passed, create the News instance
        News::where('id',$id)->update([
            'title' => $request->title,
            'text' => $request->title, // Corrected from $request->title to $request->text
            'slug' => $request->slug,
            'created_at' => $request->created_at,
        ]);

        return response()->json(['message' => 'Data Has Successfully been created']);
    }

    public function delete($id)
    {
       $delete = News::where('id',$id)->delete();

        if ($delete) return response()->json(['message' => 'Data has successfully been deleted']);
        else return config(app('name'));

    }
}
