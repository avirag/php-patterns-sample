<?php

interface IRenderable {
  public function render(): string;
}

class Input implements IRenderable {
  public function render(): string
  {
    return '<input type="text" />';
  }
}

class Text implements IRenderable {
  private $text;

  public function __construct($text) {
    $this->text = $text;
  }

  public function render(): string
  {
    return $this->text;
  }
}

// The Composite
class Form implements IRenderable {
  private $elements;

  public function render(): string
  {
    $form = '<form>';
    foreach ($this->elements as $element) {
      $form .= $element->render();
    }
    $form .= '</form>';
    return $form;
  }

  public function addElement(IRenderable $element)
  {
    $this->elements[] = $element;
  }
}

$form = new Form();
$form->addElement(new Text('First Name:'));
$form->addElement(new Input());
$form->addElement(new Text('Last Name:'));
$form->addElement(new Input());
$content = $form->render();
echo $content;
