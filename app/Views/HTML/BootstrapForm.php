<?php

namespace App\Views\HTML;

class BootstrapForm extends Form
{
    /**
     * @param $html string Code HTML a entourer
     * @return string
     */
    protected function surround($html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options = ['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        $input = '<input type="' . $type . '" name="' . $name . '" value= "' . $this->getValue($name) . '" class="form-control">';
        return $this->surround($label . $input);
    }

    public function textarea($name, $label, $id)
    {
        return $this->surround(
            '<label>' . $label . ' </label ><textarea id="' . $id . '" name = "' . $name . '" class = "form-control">' . $this->getValue($name) . '</textarea>');
    }

    public function password($name, $label)
    {
        return $this->surround(
            ' <label>' . $label . ' </label ><input type = "password" name = "' . $name . '" value = "' . $this->getValue($name) . '" class = "form-control" > ');
    }

    public function checkbox($label, $name)
    {
        return $this->surround(
            '<div class="custom-control custom-checkbox"><input name = "' . $name . '" type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">' . $label . '</label>
                </div>'
        );
    }

    public function number($label, $name)
    {
        return $this->surround(
            '<label>' . $label . '</label ><div class="col-1"><input type="text" name = "' . $name . '" class="form-control form-control-sm bfh-number""></div>');
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type = "submit" class = "btn btn-primary" > Envoyer</button > ');
    }

    public function select($name, $label, $option)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach ($option as $k => $v) {
            $attributes = '';
            if ($k == $this->getValue($name)) {
                $attributes = ' selected';
            }
            $input .= "<option value='$k' $attributes >$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

}
