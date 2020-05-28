<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
class TruckForm extends Form
{
    public function buildForm()
    {
        $currentYear=date("Y");
        $this
            ->add('marke', Field::SELECT, ['rules' => 'required'])
            ->add('Gamybos metai', Field::NUMBER, ['rules' => "required|min:1900|max:$currentYear"])
            ->add('Savininko vardas ir pavardė', Field::TEXT, ['rules' =>[
                'required',
                function($attribute, $value, $fail){
                    if($value === "value"){
                        $fail($attribute . " negalima");
                    }
                }]
                ])
            ->add('Savininkų kiekis', Field::NUMBER, ['rules' => 'min:0'])
            ->add('Komentarai', Field::TEXTAREA)
            ->add('Pridėti', Field::BUTTON_SUBMIT)
            ->add('Markė', 'select', [
                'choices' => ['0' => 'Volvo', '1' => 'VAZ', '2' => "Mercedes", '3' => "GAZ"],
                'selected' => 'empty_value',
                'empty_value' => '=== Pasirinkite markę ===',
                'rules' => 'required'
            ]);
    }
}
