<?php
namespace App\Tools;
use App\Models\Person;
/* A class that is used to authenticate users. */
class UserAuth{
    private static $instance;
    protected $person = null;
    /**
     * > The function checks if the instance of the class is not an instance of itself, if it's not, it
     * creates a new instance of itself and returns it
     *
     * @return The user() method is being returned.
     */
    public static function user()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * It takes an array of key/value pairs and sets the object's attributes to the values
     *
     * @param data The data to be set.
     */
    public function setAtt($data){
        foreach($data as $key => $value){
            $this->{$key} = $value;
        }
    }
    /**
     * It returns the object itself.
     *
     * @return The object itself.
     */
    public function getAtt(){
        return $this;
    }
    /**
     * > If the person property is null, then get the person from the database and set the person
     * property to that person
     *
     * @return The person object
     */
    public function getPerson(){
        if($this->person == null){
            $this->person = Person::whereId($this->person_id) ->with('getUser')->first();
        }
        return $this->person;
    }
    /**
     * > This function returns the person object associated with the current instance of the model
     *
     * @return The person object
     */
    public function freshPerson(){
        return $this->person = Person::whereId($this->person_id)->first();
    }
}



