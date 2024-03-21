<?php

namespace App\Livewire\Modules\Components;

use App\Models\Module;
use App\Services\Alert;
use Livewire\Component;

class SwitchCard extends Component
{
    public Module $module;

    public function submit(): void
    {
        if ($this->module->is_enabled) {
            $this->disableModule($this->module);
        } else {
            $this->enableModule($this->module);
        }

        $this->redirectRoute('modules.index');
    }

    private function enableModule(Module $module): void
    {
        $module->is_enabled = true;
        $module->save();

        Alert::success('Moduł ' . $module->label . ' został włączony.');
    }

    private function disableModule(Module $module): void
    {
        $module->is_enabled = false;
        $module->save();

        Alert::success('Moduł ' . $module->label . ' został wyłączony.');

        foreach (Module::where(['is_enabled' => true])->get() as $m) {
            if (in_array($module->name, explode(',', $m->depends_on))) {
                $this->disableModule($m);
            }
        }
    }
}
