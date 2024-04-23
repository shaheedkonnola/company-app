<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'              => (string) $this->name,
            'description'       => (string) $this->description,
            'logo_path'         => (string) $this->logo_path,
            'phone'             => (int) $this->phone,
            'annual_turn_over'  => (int) $this->annual_turn_over,
            'created_by'        => new UserResource($this->createdBy),
            'updaated_by'       => new UserResource($this->updatedBy),
            'updated_at'        => $this->updated_at ?? Carbon::parse($this->updated_at)->toISOString(),
            'created_at'        => $this->created_at ?? Carbon::parse($this->created_at)->toISOString(),
            'employees'         => $this->whenLoaded('employees', EmployeeResource::collection($this->employees)),
        ];    
    }
}
