ArrayToPathNamedObject
======================

Converts arrays to objects, but concatenates paths with "_" instead of having object->object. Terrible project to name. Written originally for a friend who didn't want `$obj->person->follower->photo`.

###For example:

When we have `$data['person']['follower']['photo']` we can access it like `$obj->person_follower_photo`. You can also pass JSON string in and it will return the object.

###Usage:

```PHP
require('ArrayToPathNamedObject.php');
$obj = new ArrayToPathNamedObject($json);
````

[@andrewhathaway](http://twitter.com/andrewhathaway)