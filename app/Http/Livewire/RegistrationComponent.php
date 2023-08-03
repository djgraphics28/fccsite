<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use App\Rules\UniqueNameCombination;

class RegistrationComponent extends Component
{
    public $firstName;
    public $middleName;
    public $lastName;
    public $extName;
    public $nickname;
    public $gender;
    public $birthDate;
    public $contactNumber;
    public $address;
    public $email;
    public $dateBaptized;
    public $isFirstTime;

    protected $rules = [
        'firstName' => 'required|max:100',
        'lastName' => 'required|max:100',
        'gender' => 'required',
        'birthDate' => 'required',
        'isFirstTime' => 'required',
    ];

    public function render()
    {
        return view('livewire.registration-component');
    }

    public function store()
    {
        $this->validate();

        // Check if a user with the given first name and last name exists
        $firstName = $this->firstName;
        $lastName = $this->lastName;
        $memberExists = Member::where('first_name', $firstName)
                        ->where('last_name', $lastName)
                        ->first();

        if ($memberExists) {
            toastr()->warning('The first name and last name combination is already in use.');
            return;
        }

        $data = [
            'first_name' => ucwords(strtolower($this->firstName)),
            'middle_name' => ucwords(strtolower($this->middleName)),
            'last_name' => ucwords(strtolower($this->lastName)),
            'ext_name' => ucwords(strtolower($this->extName)),
            'nickname' => ucwords(strtolower($this->nickname)),
            'gender' => $this->gender,
            'birth_date' => $this->birthDate,
            'address' => $this->address,
            'contact_number' => $this->contactNumber,
            'email' => $this->email,
            'date_baptized' => $this->dateBaptized,
            'is_first_time' => $this->isFirstTime,
        ];

        $data = Member::create($data);

        if($data) {
            toastr()->success('Registration succeed!');
            return redirect()->route('registration.success', ['id' => $data->id]);
        }
    }
}
