<?php

    namespace App\Http\Controllers;

    use App\Models\TemporaryFile;
    use Illuminate\Http\Request;
    use File;

    class UploadController extends Controller
    {
        public function store(Request $request)
        {
            if ($request->hasFile('attachments')) {
                $file = $request->file('attachments');
                $filename = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $file->storeAs('tractors/tmp/'. $folder, $filename);

                TemporaryFile::create([
                    'filename' => $filename,
                    'folder' => $folder,
                ]);


                return $folder;
            }

            return '';
        }
    }
