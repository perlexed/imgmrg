<?php

class BaseModel {

    protected $dataSource;
    protected $schema;
    public $attributes;


    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes = array()) {

        if(empty($this->schema)) {
            // @todo try to catch error with an exception
            //throw new Exception('Schema is not set');
        }

        foreach($attributes as $attributeName => $attributeValue) {
            if(in_array($attributeName, $this->schema)) {
                $this->attributes[$attributeName] = $attributeValue;
            }
        }

        print_r($attributes);
    }

    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * @param $attribute string Attribute name
     * @return mixed Attribute value
     */
    public function get($attribute) {
        return isset($this->attributes[$attribute])
            ? $this->attributes[$attribute]
            : null;
    }

    public function __construct() {
        $dbConn = new DatabaseConnector();
        $this->dataSource = $dbConn->getConnection();
    }

}