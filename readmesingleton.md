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