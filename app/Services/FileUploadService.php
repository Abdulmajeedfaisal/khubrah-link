<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    /**
     * Upload avatar image
     */
    public function uploadAvatar(UploadedFile $file, ?string $oldPath = null): string
    {
        // Delete old avatar if exists
        if ($oldPath) {
            $this->deleteFile($oldPath, 'avatars');
        }

        // Validate image
        $this->validateImage($file);

        // Generate unique filename
        $filename = $this->generateFilename($file);

        // Store file
        $path = $file->storeAs('avatars', $filename, 'public');

        return $path;
    }

    /**
     * Upload skill image
     */
    public function uploadSkillImage(UploadedFile $file, ?string $oldPath = null): string
    {
        if ($oldPath) {
            $this->deleteFile($oldPath, 'skills');
        }

        $this->validateImage($file);
        $filename = $this->generateFilename($file);
        $path = $file->storeAs('skills', $filename, 'public');

        return $path;
    }

    /**
     * Upload review image
     */
    public function uploadReviewImage(UploadedFile $file): string
    {
        $this->validateImage($file);
        $filename = $this->generateFilename($file);
        $path = $file->storeAs('reviews', $filename, 'public');

        return $path;
    }

    /**
     * Upload report evidence
     */
    public function uploadReportEvidence(UploadedFile $file): string
    {
        $this->validateImage($file);
        $filename = $this->generateFilename($file);
        $path = $file->storeAs('reports', $filename, 'public');

        return $path;
    }

    /**
     * Delete file from storage
     */
    public function deleteFile(string $path, string $disk = 'public'): bool
    {
        if (!$path) {
            return false;
        }

        return Storage::disk($disk)->delete($path);
    }

    /**
     * Get file URL
     */
    public function getFileUrl(string $path, string $disk = 'public'): string
    {
        if (!$path) {
            return asset('images/default-avatar.png');
        }

        return Storage::disk($disk)->url($path);
    }

    /**
     * Validate image file
     */
    protected function validateImage(UploadedFile $file): void
    {
        // Check file size (max 5MB)
        if ($file->getSize() > 5 * 1024 * 1024) {
            throw new \Exception('حجم الملف كبير جداً. الحد الأقصى 5 ميجابايت');
        }

        // Check file type
        $allowedMimes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedMimes)) {
            throw new \Exception('نوع الملف غير مدعوم. يرجى رفع صورة (JPG, PNG, GIF, WEBP)');
        }
    }

    /**
     * Generate unique filename
     */
    protected function generateFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        return time() . '_' . Str::random(10) . '.' . $extension;
    }

    /**
     * Resize image (optional - requires intervention/image package)
     */
    public function resizeImage(string $path, int $width = 800, int $height = 800): void
    {
        // TODO: Implement image resizing if needed
        // This requires: composer require intervention/image
    }
}
