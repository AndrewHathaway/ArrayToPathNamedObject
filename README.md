ArrayToPathNamedObject
======================

Converts arrays to objects, but concatenates paths with "_" instead of having object->object. Terrible project to name. Written originally for a friend who didn't want `$obj->person->follower->photo`. An exception will be thrown if conflicting keys are the conflicting.

###For example:

When we have `$data['person']['follower']['photo']` we can access it like `$obj->person_follower_photo`. You can also pass JSON string in and it will return the object.

###Usage:

- Can be installed via Composer.

```PHP
require('ArrayToPathNamedObject.php');

try {
	$obj = new ArrayToPathNamedObject($json);
} catch(Exception $e) {
	die($e);
}

````

[@andrewhathaway](http://twitter.com/andrewhathaway)