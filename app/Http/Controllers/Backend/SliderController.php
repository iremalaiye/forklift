<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use App\Http\Requests\SliderRequest;



class SliderController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    //show the slider page of the panel
    public function index()
    {
        $sliders=Slider::all();
        return view('backend.pages.slider.index',compact('sliders'));
    }


    /**
     * Show the form for creating a new resource.
     */
    //show the slider creation page of the panel
    public function create()
    {

        return view('backend.pages.slider.edit');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        // Check if an image is uploaded
        if($request->hasFile('image')){
            $resim=$request->file('image');
            // Create a unique filename
            $dosyaadi=time().'-'.Str::slug($request->name).'.'.$resim->getClientOriginalExtension();
            // Move the uploaded file to public path
             $resim->move(public_path('img/slider'),$dosyaadi);

        }

        // Create slider record in the database
        Slider::create([
            'name'=>$request->name,
            'link'=>$request->link,
              'content'=>$request->content,
              'status'=>$request->status,
            'image'=> isset($dosyaadi) ? 'img/slider/' . $dosyaadi : null,]
        );

        return redirect()->route('panel.slider.index')->with('success', 'Slayt içeriği başarıyla oluşturuldu!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    //show the slider edit page of panel
    public function edit(string $id)
    {
        $slider=Slider::where('id',$id)->first();
        return view('backend.pages.slider.edit',compact('slider'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Check if an image is uploaded
        if($request->hasFile('image')){
            $resim=$request->file('image');
            // Create a unique filename
            $dosyaadi=time().'-'.Str::slug($request->name).'.'.$resim->getClientOriginalExtension();
            // Move the uploaded file to public path
            $resim->move(public_path('img/slider'),$dosyaadi);
        }

        // Update the slider record
        Slider::where('id',$id)->update([
                'name'=>$request->name,
                'link'=>$request->link,
                'content'=>$request->content,
                'status'=>$request->status,
                'image'=>isset($dosyaadi) ? 'img/slider/' . $dosyaadi : null,]
        );
        return redirect()->route('panel.slider.index')->with('success', 'Slayt İçeriği başarıyla güncellendi!');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider=Slider::where('id',$id)->firstorFail();

        // Delete image file if it exists
        if(file_exists($slider->image)){
            if(!empty($slider->image)){
                unlink($slider->image);
            }

        }

        // Delete slider record
        $slider->delete();

        return back()->withSuccess('Başarıyla silindi!!');
    }


    public function status(Request $request)
    {
        // Convert incoming status to boolean then to string
        $update = filter_var($request->statu, FILTER_VALIDATE_BOOLEAN);
        $updateString = $update ? '1' : '0';

        // Update status in database
        Slider::where('id', $request->id)->update(['status' => $updateString]);

        return response(['error' => false, 'status' => $updateString]);
    }



}
