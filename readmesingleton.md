# Singleton Design Pattern - in c++
In software engineering, the singleton pattern is a software design pattern that restricts the instantiation of a class to one "single" instance.

## Include Headers

```
#include <iostream>
using namespace std;
```
 iostream provides basic input and output services for C++ programs. So when we run a program to print something, “using namespace std” says if you find something that is not declared in the current scope go and check std. using namespace std; are used. It is because computer needs to know the code for the cout, cin functionalities and it needs to know which namespace they are defined.

 ## Creating a Class Circle

 To understand the singleton design pattern. Lets make a class called circle.

```
class Circle{
	
};
```

Now we will initiate a static Circle object, and a datatype for the radius of circle, and contructor of Circle class

```
class Circle{
    static Circle *instance;
	int radius;
	Circle() : radius(5){}	
};
```
The implementation of Circle class is private uptil now. But now we will implement some of the public methods.
```
class Circle{
    static Circle *instance;
	int radius;
	Circle() : radius(5){}	

public:
	static Circle *getInstance() {
		if(instance == NULL) 
			instance = new Circle();
		return instance;
	}
	void setRadius(int r) 
	{
	    radius = r;
	}
    int getRadius() 
    {
        return radius;
    }
	void radiusOfCircle() {
		cout << "Radius Of Circle: " << 3.142*radius*radius << endl;
	}

};

```
Lets examine the above code:
* **static Circle *getInstance() :** This method is used to initiate the object of the class if the object is not created yet.
**if(instance == NULL)** is used to check whether the object/instance of the circle class is created or not previously. If it is not created than the instance will be equal to null. So **instance = new Circle();** will create a new instance then and return the instance by **return instance;**

* **void setRadius(int r)** This is a setter method to set the radius of the class. It takes an argument and initialize the class the radius attribute with the **r** value using **radius = r;**

* **int getRadius()** This is a getter method to get the radius of the class. It return the radius of the class by **return radius;**

* **void radiusOfCircle()** This method will just print the radius of the circle.

## Setting Circle instance to Null

```
Circle *Circle::instance = NULL;
```
The above line of code set the object of circle class to NULL or it indicated that no object had been created yet.

## Initiating Object Instance Outside of Main Function


```
void xyz () {
	Circle *inst = Circle::getInstance();
	inst->radiusOfCircle();
}
```
The above code will create the circle instance and call the radiusOfCircle method to print the radius.

## Initiating Object Instance Inside of Main Function

The int main() funciton will also create the object of the class circle and call the radiusOfCircle method to print the radius.It also call the **xyz()** function before and after updating the radius attribute using setter method i.e **setRadius(10)** as shown in below code.

```
int main() {

	Circle *inst = Circle::getInstance();
	inst->radiusOfCircle();
	xyz();
	inst->setRadius(10);
	xyz();
	return 0;
}
```
## Conclusion

So wherever we go in the program and initailize the same instance it will give the same output as shown in above **main() function** and **xyz function**. Thats the beauty of the **Singleton Design Pattern**


