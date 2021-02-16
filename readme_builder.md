# Builder Design Pattern - in c++
The Builder design pattern is one of the GoF design patterns that describe how to solve recurring design problems in object-oriented software. The Builder design pattern solves problems like: How can a class (the same construction process) create different representations of a complex object?
## Include Headers

```
#include <iostream>
using namespace std;
```
 iostream provides basic input and output services for C++ programs. So when we run a program to print something, “using namespace std” says if you find something that is not declared in the current scope go and check std. using namespace std; are used. It is because computer needs to know the code for the cout, cin functionalities and it needs to know which namespace they are defined.

## Creating a Parent Class Helicopter

 To understand the docrator design pattern. Lets make a class called Helicopter.

```
class Helicopter{
    string _heli;
    string _engine;
public:
    Helicopter(string heliType):_heli{heliType} {}
    void setEngine(string type) { _engine = type; }
    string getEngine()          { return _engine; }
    
    void show() {
    	cout <<_heli << " has " <<_engine << endl;
    }
};
```
It have its own constructor and getter and setter fucntion for setting and retrieving engine type. It also has a **void show()** method for displaying the attributes

## Creating an Abstract Class HelicopterBuilder

The HelicopterBuilder class has a pretected object of class helicopter and its own virtual functions and a method that returns the object of helicopter class
```
class HelicopterBuilder{
protected:
    Helicopter *_heli;
public:
    virtual void getPartsDone() = 0;
    virtual void buildEngine() = 0;
    Helicopter* getHeli(){ return _heli; }
};
```

## Creating a Concrete Classes

Now we will create two concrete classes **NavyBuilder** and **ArmyBuilder** .These are derived from **HelicopterBuilder** parent class.

```
class NavyBuilder: public HelicopterBuilder {
public:
    void getPartsDone() { _heli = new Helicopter("Navy Helicopter"); }
    void buildEngine()  { _heli->setEngine("Navy Engine");   }
};

class ArmyBuilder: public HelicopterBuilder {
public:
    void getPartsDone() { _heli = new Helicopter("Army Helicopter"); }
    void buildEngine()  { _heli->setEngine("Army Engine");   }
};
```
The method **getPartsDone()** will create a new **Helicopter** class object by **_heli = new Helicopter("Navy Helicopter");** and **setEngine()** will initialize the value of parent' class setEngine attribute

## Creating a Class Director

This class will define steps and tells to the builder that build in given order.

```
class Director{
    HelicopterBuilder *builder;
public:
    Helicopter* createHeli(HelicopterBuilder *builder) {
        builder->getPartsDone();
        builder->buildEngine();
        return builder->getHeli();
    }
};
```

## Final Step - Main Function

The int main() function will create the objects for each of the classes and assign the director class the reference of builder classes and then call the respective show methods of builder classes.

```
int main() {
    Director dir;
    ArmyBuilder a;
    NavyBuilder b;
	Helicopter *army = dir.createHeli(&a);
	Helicopter *navy = dir.createHeli(&b);
	army->show();
	navy->show();
	return 0;
}
```

## Conclusion

Therefore, it obeys the builder design pattern to solve recurring design problems in object-oriented software.

