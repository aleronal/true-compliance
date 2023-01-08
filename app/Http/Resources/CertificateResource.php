<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'stream_name' => $this->stream_name,
            'property_id' => $this->property_id,
            'issue_date' => $this->issue_date,
            'next_due_date' => $this->next_due_date,
        ];
    }
}
