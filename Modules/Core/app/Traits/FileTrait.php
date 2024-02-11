<?php

namespace Modules\Core\app\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

trait FileTrait
{
    public function upload(UploadedFile $file, string $dir, string $name = null, mixed $old = null, string $disk = 'public'): ?string
    {
        if (!$file->isValid()) {
            session()->flash('error', $file->getClientOriginalName() . " is not valid");
            return null;
        }

        if (!is_null($old)) {
            $this->deleteFile($old, $disk);
        }
        $name = $name ?: time();

        $filename = $name . '.' . $file->getClientOriginalExtension();

        return Storage::disk($disk)->putFileAs($dir, $file, $filename);

    }

    public function deleteFile(mixed $filename, string $disk = 'public'): void
    {
        try {
            Storage::disk($disk)->delete($filename);
        } catch (FileException $exception) {
            session()->flash('error', $exception->getMessage());
        }
    }

    public function deleteDir(string $dir, string $disk = 'public'): void
    {
        try {
            Storage::disk($disk)->deleteDirectory($dir);
        } catch (FileException $exception) {
            session()->flash('error', $exception->getMessage());
        }
    }
}
