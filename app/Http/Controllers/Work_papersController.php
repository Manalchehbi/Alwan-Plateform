<?php

namespace App\Http\Controllers;

use App\Models\Work_papers;
use App\Models\workSheetCategory;
use App\Models\worksheetThumbnail;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Imagick;


class Work_papersController extends Controller
{
    public function formAdd()
    {
        
        $workSheetCategories=workSheetCategory::whereNotNull('parent_id')->get();
        return view('worksheets.worksheets',compact('workSheetCategories'));
    }
    public function formAll()
    {
        $worksheets = Work_papers::all();
        return view('worksheets.all_worksheets', compact('worksheets'));
    }
    public function all()

    {

        $worksheets = Work_papers::all();
        
        $workSheetCategories = workSheetCategory::whereNull('parent_id')->get();
        return view('worksheets.workpaper', compact('worksheets','workSheetCategories'));
    }

    public function insert(Request $request)
    { 
        $request->validate([
            'pdf_title'         =>   'required|string',
            'pdf' => "required|mimes:pdf|max:10000",
            'category_id'         =>   'required|numeric',
        ]);
        $works =  new  Work_papers();
        $works->title = $request->input('pdf_title');
        $works->category_id = $request->input('category_id');
        if ($request->hasfile('pdf')) {

            $file = $request->file('pdf');
            $path = 'pdfs/worksheets';
            $works->path = (new FileUploadService)->upload($file, $path);
            $works->save();
            
            // TO Be Refactored
            $imgExt = new Imagick();
            $imgExt->readImage(Storage::path($works->path));
           
            foreach ($imgExt as $i => $imgExt) {    
                $imgExt->setImageFormat("png"); 
                 
                $imgExt->setBackgroundColor("white");  
                $imgExt->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE ); 
                $imgName = md5_file($file->getRealPath()).($i + 1);
                $path = "pdfs/worksheets/thumbnails/$imgName.png";
                Storage::put($path, $imgExt);
                $Thumbnail = new worksheetThumbnail();
                $Thumbnail->work_paper_id = $works->id;
                $Thumbnail->page_number = $i;
                $Thumbnail->path = $path;
                $Thumbnail->save();
                if ($i == 4) {
                    break;    
                }
            }
            $imgExt->clear();
        }

        

        return redirect()->back()->with('status', 'Worksheet Added Successfully');
    }
    //---------------------edit
    public function edit($id)
    {
        $works = Work_papers::find($id);
        
        $workSheetCategories=workSheetCategory::whereNotNull('parent_id')->get();
        return view('worksheets.edit', compact('works',"workSheetCategories"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pdf_title'         =>   'required|string',
            'pdf' => "nullable|mimes:pdf|max:10000",
            'category_id'         =>   'required|numeric',
        ]);

        $works = Work_papers::findOrFail($id);


        if ($request->hasfile('pdf')) {


            $file = $request->file('pdf');
            $path = 'pdfs/worksheets';
            $oldPath = $works->path;
            $works->path = (new FileUploadService)->upload($file, $path);
            (new FileUploadService)->remove($oldPath);
        }
        $works->title = $request->input('pdf_title');
        $works->category_id = $request->input('category_id');
        $works->update();

            // TO Be Refactored 
            if ($request->hasfile('pdf')) {
            $imgExt = new Imagick();
            $imgExt->readImage(Storage::path($works->path));
            $OldThumbnails = worksheetThumbnail::where('work_paper_id',$id)->get();
                foreach ($OldThumbnails as $OldThumbnail) {
                    (new FileUploadService)->remove($OldThumbnail->path);
                    $OldThumbnail->delete();
                }
            foreach ($imgExt as $i => $imgExt) {    
                
               
                $imgExt->setImageFormat("png");   
                $imgExt->setBackgroundColor("white");  
                $imgExt->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE ); 
                $imgName = md5_file($file->getRealPath()).($i + 1);
                $path = "pdfs/worksheets/thumbnails/$imgName.png";
                Storage::put($path, $imgExt);
                
                $Thumbnail = new worksheetThumbnail();
                $Thumbnail->work_paper_id = $works->id;
                $Thumbnail->page_number = $i;
                $Thumbnail->path = $path;
                $Thumbnail->save();
               
                if ($i == 4) {
                    break;    
                }
            }
            $imgExt->clear();

        }
        return redirect()->back()->with('status', 'Worksheet Updated Successfully');
    }

    public function delete($id)
    {
        $worksheets = Work_papers::find($id);
        $worksheets->delete();
        return redirect()->back()->with('success','worksheets deleted Successfully');
    }
}
