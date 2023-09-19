<?php

namespace App\Traits;

use Livewire\WithPagination;

trait EmadEdeenTrait
{
    use WithPagination, ConfirmTrait, SortSearchTrait, MessageTrait;

    public $emadedeen_id, $name, $email;
    public $department_id, $device_id, $ip_id, $switch_id, $patch_id;

    protected function rules()
    {
        $rules = [
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|max:255|unique:emad_edeens,email,' . $this->emadedeen_id,
            'department_id' => 'nullable|numeric|exists:departments,id',
            'device_id' => 'nullable|numeric|exists:devices,id',
            'ip_id' => 'nullable|numeric|exists:ips,id',
            'switch_id' => 'nullable|numeric|exists:switch_branchs,id',
            'patch_id' => 'nullable|numeric|exists:patch_branchs,id',
        ];

        return $rules;
    }

    public function resetItems()
    {
        $this->reset();
        $this->resetValidation();
    }
}