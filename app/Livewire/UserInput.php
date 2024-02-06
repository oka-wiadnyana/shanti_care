<?php

namespace App\Livewire;

use App\Models\Input;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
 

class UserInput extends Component
{
    use WithFileUploads;
    public $currentStep=1;
    public $name,$phone_number, $input_type,$input, $evidence;

    public function submitFirstForm(){
        $validatedData = $this->validate([
            'name' => 'required',
            'phone_number' => 'required',
           
        ]);
        $this->currentStep=2;
    }
    public function submitSecondForm(){
        $validatedData = $this->validate([
            'input_type' => 'required',
            'input' => 'required',
            'evidence' => 'nullable|sometimes|image|mimes:png,jpg, jpeg',
           
        ]);

        if($this->evidence){
            $evidence='Evidence-'.time().'.'.$this->evidence->getClientOriginalExtension();
            $this->evidence->storeAs('evidence',$evidence,'real_public');
        }else {
            $evidence="";
        }
        $ticket=Str::random(5);
        if($this->input_type==1){
            $ticket=Str::random(5);
        }else {
            $ticket="";
        }
        $input_date=now()->format('Y-m-d');
        $data_input=[
            'name'=>$this->name,
            'phone_number'=>$this->phone_number,
            'input_type'=>$this->input_type,
            'input'=>$this->input,
            'input_date'=>$input_date,
            'evidence'=>$evidence,
            'ticket'=>$ticket,
        ];


        Input::create($data_input);

        $this->clearForm();


        $this->currentStep=3;
    }
    public function prevStep(){
        $this->currentStep--;
    }
    public function toStepOne(){
        $this->currentStep=1;
    }

    public function render()
    {
        return view('livewire.user-input');
    }

    public function clearForm(){
        $this->name="";
        $this->phone_number="";
        $this->input_type="";
        $this->input="";
        $this->evidence="";
    }
}
