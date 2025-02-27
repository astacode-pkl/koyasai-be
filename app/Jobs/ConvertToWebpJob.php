<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConvertToWebpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $destinationPath;
    protected $imageName;
    protected $imageMimeType;

    /**
     * Create a new job instance.
     */
    public function __construct($destinationPath, $imageName, $imageMimeType)
    {
        $this->destinationPath = $destinationPath;
        $this->imageName = $imageName;
        $this->imageMimeType = $imageMimeType;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sourceImagePath = public_path($this->destinationPath . $this->imageName);
        $webpImagePath = public_path($this->destinationPath . pathinfo($this->imageName, PATHINFO_FILENAME) . '.webp');

        $sourceImage = null;
        switch ($this->imageMimeType) {
            case 'image/jpeg':
                $sourceImage = @imagecreatefromjpeg($sourceImagePath);
                break;
            case 'image/png':
                $sourceImage = @imagecreatefrompng($sourceImagePath);
                break;
            default:
                $sourceImage = false;
                break;
        }

        if ($sourceImage !== false) {
            imagewebp($sourceImage, $webpImagePath, 80); // Kompresi 80%
            imagedestroy($sourceImage);
            @unlink($sourceImagePath); // Hapus file asli setelah dikonversi
        }
    }
}
