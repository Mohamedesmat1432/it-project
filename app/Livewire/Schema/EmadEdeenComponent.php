<?php

namespace App\Livewire\Schema;

use App\Models\Department;
use App\Models\Device;
use App\Models\EmadEdeen;
use App\Models\Ip;
use App\Models\PatchBranch;
use App\Models\SwitchBranch;
use App\Traits\EmadEdeenTrait;
use Livewire\Component;

class EmadEdeenComponent extends Component
{
    use EmadEdeenTrait;

    protected $queryString = [
        'search' => ['except' => ''],
        'sort_by' => ['except' => 'id'],
        'sort_asc' => ['except' => true]
    ];

    public function render()
    {
        $departments = Department::pluck('name', 'id');
        $devices = Device::pluck('name', 'id');
        $ips = Ip::pluck('number', 'id');
        $patchs = PatchBranch::pluck('port', 'id');
        $switchs = SwitchBranch::pluck('port', 'id');

        $emadEdeens = EmadEdeen::when($this->search, function ($query) {
            return $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')->paginate(10);

        return view('livewire.schema.emad-edeen-component', [
            'emadEdeens' => $emadEdeens,
            'departments' => $departments,
            'devices' => $devices,
            'ips' => $ips,
            'patchs' => $patchs,
            'switchs' => $switchs,
        ]);
    }

    public function confirmEmadEdeenAdd()
    {
        $this->resetItems();
        $this->confirm_form = true;
    }

    public function confirmEmadEdeenEdit($id)
    {
        $this->resetItems();
        $this->confirm_form = true;
        $emadEdeen = EmadEdeen::findOrFail($id);
        $this->emadedeen_id = $emadEdeen->id;
        $this->name = $emadEdeen->name;
        $this->email = $emadEdeen->email;
        $this->department_id = $emadEdeen->department_id;
        $this->device_id = $emadEdeen->device_id;
        $this->ip_id = $emadEdeen->ip_id;
        $this->switch_id = $emadEdeen->switch_id;
        $this->patch_id = $emadEdeen->patch_id;
    }

    public function saveEmadEdeen()
    {
        $validated = $this->validate();
        if (isset($this->emadedeen_id)) {
            $emadEdeen = EmadEdeen::findOrFail($this->emadedeen_id);
            $emadEdeen->update($validated);
            $this->successMessage(__('Emad Edeen updated successfully'));
        } else {
            EmadEdeen::create($validated);
            $this->successMessage(__('Emad Edeen created successfully'));
        }

        $this->confirm_form = false;
    }

    public function confirmEmadEdeenDeletion($id)
    {
        $this->confirm_delete = true;
        $this->emadedeen_id = $id;
    }

    public function deleteEmadEdeen()
    {
        $emadEdeen = EmadEdeen::findOrFail($this->emadedeen_id);
        $emadEdeen->delete();
        $this->successMessage(__('Emad Edeen deleted successfully'));
        $this->confirm_delete = false;
    }
}