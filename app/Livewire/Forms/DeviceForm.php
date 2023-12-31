<?php

namespace App\Livewire\Forms;

use App\Models\Device;
use Livewire\Form;

class DeviceForm extends Form
{
    public ?Device $device;
    public $device_id;
    public $name;
    public $serial;
    public $specifications;
    public $checkbox_arr = [];

    protected function rules()
    {
        return [
            'name' => 'required|string|min:2',
            'serial' => 'required|numeric|min:2',
            'specifications' => 'nullable|string|max:500',
        ];
    }

    protected $validationAttributes = [
        'name' => 'Name',
        'serial' => 'Serial',
        'specifications' => 'Secifications',
    ];

    public function setDevice(Device $device)
    {
        $this->device = $device;
        $this->device_id = $device->id;
        $this->name = $device->name;
        $this->serial = $device->serial;
        $this->specifications = $device->specifications;
    }

    public function store()
    {
        $validated = $this->validate();
        Device::create($validated);
        $this->reset();
    }

    public function update()
    {
        $validated = $this->validate();
        $this->device->update($validated);
    }

    public function delete($id)
    {
        $device = Device::findOrFail($id);
        $device->edokis()->update(['device_id' => null]);
        $device->emadEdeens()->update(['device_id' => null]);
        $device->delete();
    }


    public function checkboxAll()
    {
        $data = Device::pluck('id')->toArray();
        $checkbox_count = count($this->checkbox_arr);

        if ($checkbox_count <= 1 || $checkbox_count < count($data)) {
            $this->checkbox_arr = $data;
        } else {
            $this->checkbox_arr = [];
        }
    }

    public function bulkDelete()
    {
        $devices = Device::whereIn('id', $this->checkbox_arr);

        foreach ($devices as $device) {
            $device->edokis()->update(['device_id' => null]);
            $device->emadEdeens()->update(['device_id' => null]);
        }

        $devices->delete();
    }
}
