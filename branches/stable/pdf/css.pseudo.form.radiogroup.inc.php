<?php

class CSSPseudoFormRadioGroup extends CSSProperty {
  function CSSPseudoFormRadioGroup() { $this->CSSProperty(true, true); }

  function default_value() { return null; }

  function parse($value) { 
    return $value;
  }
}

register_css_property('-html2ps-form-radiogroup', new CSSPseudoFormRadioGroup);

?>