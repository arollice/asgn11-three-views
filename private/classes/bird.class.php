<?php

class Bird extends DatabaseObject
{

  static protected $table_name = 'birds';
  static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];
  public $errors = [];

  public $id;
  public $common_name;
  public $habitat;
  public $food;
  public $conservation_id;
  public $backyard_tips;


  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct',
  ];

  // Getter method for the conservation options
  public static function get_conservation_options()
  {
    return self::CONSERVATION_OPTIONS;
  }

  public function __construct($args = [])
  {
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    //$this->behavior = $args['behavior'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? '';
    $this->backyard_tips = $args['backyard_tips'] ?? '';
  }


  public function conservation()
  {
    if ($this->conservation_id > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "Unknown";
    }
  }

  protected function validate()
  {
    $this->errors = [];

    if (is_blank($this->common_name)) {
      $this->errors[] = "Name cannot be blank.";
    }
    if (is_blank($this->habitat)) {
      $this->errors[] = "Habitat cannot be blank.";
    }
    if (is_blank($this->food)) {
      $this->errors[] = "Food cannot be blank.";
    }
    if (is_blank($this->conservation_id)) {
      $this->errors[] = "Conservation ID cannot be blank.";
    }

    return $this->errors;
  }

  public function get_name()
  {
    return $this->common_name;
  }
}
