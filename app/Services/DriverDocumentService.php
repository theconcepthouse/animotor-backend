<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DriverDocument;
use App\Models\User;

class DriverDocumentService
{
    public function createRequired(User $driver): void
    {
        $documentTypes = Document::select('id','is_required')->where('is_required', true)->get();

        foreach ($documentTypes as $documentType) {
            if (!$driver->documents->contains('document_id', $documentType->id)) {
                $driverDocument = new DriverDocument();
                $driverDocument->driver_id = $driver->id;
                $driverDocument->document_id = $documentType->id;
                $driverDocument->save();
            }
        }

    }

    public function createOrUpdate($document_id, $driver_id, ?string $status, ?string $expiryDate, ?string $file, ?string $comment, ?bool $is_approved): void
    {
        $driverDocument = DriverDocument::where('document_id', $document_id)->where('driver_id', $driver_id)->first();

        if ($driverDocument) {
            $driverDocument->status = $status ?? $driverDocument->status;
            $driverDocument->comment = $comment ?? $driverDocument->comment;
            $driverDocument->file = $file ?? $driverDocument->file;
            $driverDocument->is_approved = $is_approved ?? $driverDocument->is_approved;
            $driverDocument->expiry_date = $expiryDate ?? $driverDocument->expiry_date;
        } else {
            $driverDocument = new DriverDocument();
            $driverDocument->document_id = $document_id;
            $driverDocument->driver_id = $driver_id;
            $driverDocument->comment = $comment;
            $driverDocument->file = $file;
            $driverDocument->expiry_date = $expiryDate;
        }
        $driverDocument->save();
    }
}
