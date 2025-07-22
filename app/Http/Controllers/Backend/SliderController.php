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
    public function index()
    {
        $sliders=Slider::all();
        return view('backend.pages.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.pages.slider.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {

        if($request->hasFile('image')){
            $resim=$request->file('image');
            $dosyaadi=time().'-'.Str::slug($request->name).'.'.$resim->getClientOriginalExtension();
             $resim->move(public_path('img/slider'),$dosyaadi);

        }

        Slider::create([
            'name'=>$request->name,
            'link'=>$request->link,
              'content'=>$request->content,
              'status'=>$request->status,
            'image'=> isset($dosyaadi) ? 'img/slider/' . $dosyaadi : null,]
        );
        return back()->withSuccess('Başarıyla oluşturuldu!');

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
        if($request->hasFile('image')){
            $resim=$request->file('image');
            $dosyaadi=time().'-'.Str::slug($request->name).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('img/slider'),$dosyaadi);
        }
        Slider::where('id',$id)->update([
                'name'=>$request->name,
                'link'=>$request->link,
                'content'=>$request->content,
                'status'=>$request->status,
                'image'=>isset($dosyaadi) ? 'img/slider/' . $dosyaadi : null,]
        );
        return redirect()->route('panel.slider.index')->with('success', 'Ürün başarıyla güncellendi!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider=Slider::where('id',$id)->firstorFail();
        if(file_exists($slider->image)){
            if(!empty($slider->image)){
                unlink($slider->image);
            }

        }

        $slider->delete();

        return back()->withSuccess('Başarıyla silindi!!');
    }


}
