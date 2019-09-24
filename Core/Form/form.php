<?php
namespace Core\Form;
class Form{
    private $data;
    public $surround = 'p';
    public function __construct($data = array()){
        $this->data = $data;
    }

    private function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

   protected function getValue($index){
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($name,$label,$options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>'. $label . '</label>';
        if($type === 'textarea'){
            $input = '<textarea name="'.$name.'" >'.$this->getValue($name).'</textarea>';
        }else{
            $input = '<input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'">';

        }
        return $this->surround($label .$input);

    }

    public function submit(){
       return $this->surround('<button type="submit">Envoyer</button>');
    }
}