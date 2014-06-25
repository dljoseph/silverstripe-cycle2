<?php

/**
 * Class Slide
 */
class Slide extends DataObject {

    private static $singular_name = "Slide";
    private static $plural_name = "Slides";

    public static $db = array (
        'Title' => 'Varchar(128)',
        'Copy' => 'HTMLVarchar(255)'
    );

    public static $has_one = array (
        'Image' => 'Image'
    );

    public function getCMSFields() {
        return new FieldList(
            UploadField::create('Image'),
            TextField::create('Title'),
            HTMLEditorField::create('Copy')->setRows(5)
        );
    }
}