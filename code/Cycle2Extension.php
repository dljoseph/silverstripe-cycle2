<?php

/**
 * Class Cycle2PageExtension
 */
class Cycle2PageExtension extends DataExtension{

    private static $db = array(
    );

    private static $many_many = array(
        'Slides' => 'Slide'
    );

    private static $many_many_extraFields = array(
        "Slides" => array(
            "SortOrder" => 'Int'
        )
    );

    public function updateCMSFields(FieldList $fields) {

        //add a GridField datagrid for managing images

        // Create a default configuration for the new GridField, allowing record editing
        $config = GridFieldConfig_RelationEditor::create(10); //show 10 items per page
        $config->addComponent(GridFieldOrderableRows::create('SortOrder'));

        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Image.CMSThumbnail' => 'Slide Image',
            'Title'=> 'Slide Title', // Retrieve from a has-many relationship
            'Copy'=> 'Slide Copy', // Retrieve from a has-many relationship
        ));
        // Create a gridfield to hold the student relationship
        $slidesField = new GridField(
            'Slides', // Field name
            'Slide', // Field title
            $this->owner->Slides(), // List of all related students
            $config
        );
        // Create a tab named "Slides" and add our field to it
        $fields->addFieldToTab('Root.Slides', $slidesField);

    }

    public function getOrderedSlides(){
        return $this->owner->getManyManyComponents("Slides")->sort("SortOrder");
    }

    public function MoreThanOneSlide() {
        return ($this->owner->Slides()->count() > 1); //returns true if more than one slide, false if not
    }

}


/**
 * Class Cycle2Page_ControllerExtension
 */
class Cycle2Page_ControllerExtension extends Extension {

    public function onAfterInit(){
        Requirements::css(CYCLE2_DIR.'/css/cycle2.css');
        Requirements::javascript("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js");
        Requirements::javascript(CYCLE2_DIR.'/javascript/jquery.cycle2.min.js');
    }

    public function Slideshow(){

        $slides = $this->owner->getOrderedSlides();

        if($slides->count() > 0){
            $data = new ArrayData(
                array(
                    "Slides" => $slides,
                    "MoreThanOneSlide" => $this->owner->MoreThanOneSlide()
                )
            );

            return $data->renderWith('Cycle2');
        } else {
            return false;
        }
    }



}