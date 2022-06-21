<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Livewire\Component;

class ExperienceForm extends Component implements HasForms
{
    use InteractsWithForms;

    public Profile $profile;

    public function mount(Profile $profile) : void {
        $this->profile = $profile;
        $this->form->fill([
            'experiences' => $profile->experiences?->toArray()
        ]);
    }

    protected function getFormSchema() : array {
        return [
            Repeater::make('experiences')
            ->relationship('experiences')
            ->schema([
                Select::make('job_title_id')
                ->relationship('jobTitle', 'name')
                ->searchable()
                ->preload(),
                Select::make('company_id')
                ->relationship('company', 'name')
                ->searchable()
                ->preload(),
                Textarea::make('description'),
                Checkbox::make('current')
                ->reactive()
                ->nullable(),
                DatePicker::make('started_at'),
                DatePicker::make('finished_at')
                ->hidden(fn ($get) => $get('current'))
                ->nullable(),
            ])
            ->orderable()
        ];
    }

    public function submit() {
        $this->profile->update(
            $this->form->getState()
        );
    }

    protected function getFormModel(): Profile {
        return $this->profile;
    }

    public function render()
    {
        return view('livewire.profile.experience-form');
    }
}
