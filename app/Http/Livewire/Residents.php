<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Resident;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Residents extends Component
{
    use LivewireAlert;
    public  $FirstName, $MiddleName, $LastName, $Suffix, $TimeIn, $AMorPM,  $forUpdate, $sessionID;

    public function render()
    {
        $this->list = Resident::orderBy('id','DESC')->get();
        return view('livewire.residents');
    }

    public function delete($id)
    {
        $delete = Resident::where('id', $id)->delete();
        if($delete)
         $this->alert('success','Successfuly deleted!');
    }
    public function update($id)
    {
        $info = Resident::where('id', $id)->first();
        
        if(isset($info)){
            $this->sessionID = $id;
            $this->forUpdate = true;
            $this->FirstName = $info->FirstName;
            $this->MiddleName = $info->MiddleName;
            $this->LastName = $info->LastName;
            $this->Suffix = $info->Suffix;
            $this->TimeIn = $info->TimeIn;
            $this->AMorPM = $info->AMorPM;
        }
    }

    public function saveResident()
    {
        $validate = $this->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'TimeIn' => 'required',
            'AMorPM' => 'required',
        ]);

        if($validate){
            if($this->forUpdate){
                $data = [
                    'FirstName' => $this->FirstName,
                    'MiddleName' => $this->MiddleName,
                    'LastName' => $this->LastName,
                    'Suffix' => $this->Suffix,
                    'TimeIn' => $this->TimeIn,
                    'AMorPM' => $this->AMorPM,
                ];

                $update = Resident::where('id', $this->sessionID)
                ->update($data);
                if($update){
                    $this->alert('success', $this->FirstName.''.$this->LastName.' has been updated',['toast' => false,'position' => 'center']);
                }

            }else{
                $c = new Resident();
                $c->ResidentNo = strtoupper(uniqid());
                $c->FirstName = $this->FirstName;
                $c->MiddleName = $this->MiddleName;
                $c->LastName = $this->LastName;
                $c->Suffix = $this->Suffix;
                $c->TimeIn = $this->TimeIn;
                $c->AMorPM = $this->AMorPM;
                $c->save();

                $this->alert('success', $this->FirstName.''.$this->LastName.' (has been saved)',['toast' => false,'position' => 'center']);
            }
            
        
            
            unset($this->FirstName);
            unset($this->MiddleName);
            unset($this->LastName);
            unset($this->Suffix);
            unset($this->TimeIn);
            unset($this->AMorPM);
        }
    }
}





