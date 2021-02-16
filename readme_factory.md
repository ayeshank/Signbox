# Factory Design Pattern - in c++
A Factory Pattern or **Factory Method Pattern** says that just define an interface or abstract class for creating an object but let the subclasses decide which class to instantiate. In other words, subclasses are responsible to create the instance of the class.

The Factory Method Pattern is also known as **Virtual Constructor**.

## Include Headers

```
#include <iostream>
using namespace std;
```
 iostream provides basic input and output services for C++ programs. So when we run a program to print something, “using namespace std” says if you find something that is not declared in the current scope go and check std. using namespace std; are used. It is because computer needs to know the code for the cout, cin functionalities and it needs to know which namespace they are defined.

## Creating a Parent Class Internship

 To understand the factory design pattern. Lets make a class called circle.

```
class Internship
{
    public:
    virtual void certificate()=0;
};
```
It have its pure virtual method called **certificate** that has to be implemented in its child/subclasses.
Now we will see how this method will be implemented in the child class

## Creating a subclass ReactIntern

The ReactIntern class is the child class of Intenrhsip class. So we had mentioned **public Internship** after the **:** (semicolon) to gain access to public attributes and method of Internhsip class as shown below:

```
class ReactIntern : public Internship
{
    public:
    virtual void certificate()
    {
        cout<<"React Internee Certificate"<<endl;
    };
};
```
The **virtual void certificate()** method is the method of parent class **Internship** which is to be implemented in the subclass. It simply print a single line statement.

## Creating a subclass NodeJSIntern

The NodeJSIntern class is also the child class of Intenrhsip class. So we had again mentioned **public Internship** after the **:** (semicolon) to gain access to public attributes and method of Internhsip class as shown below:

```
class NodeJSIntern : public Internship
{
    public:
    virtual void certificate()
    {
        cout<<"NodeJS Internee Certificate"<<endl;
    };
};
```
The **virtual void certificate()** method is the method of parent class **Internship** which is to be implemented in the subclass. It simply print a single line statement.

## Creating a Parent InternshipManager

The InternshipManager class has a private object attribute i.e. **Internship internship** and a pure virtual function of OragnizeInternee i.e. **virtual Internship OrganizeInternee()=0**
```
class InternshipManager
{
    private:
    Internship *internship;
    public:
    virtual Internship* OrganizeInternee()=0;
    Internship* Newinternship()
    {
        cout<<"Internship Manager manages Internships"<<endl;
        internship = OrganizeInternee();
        return internship;
    }
};
```
The **Internship Newinternship()** method implemented using reference to the Internship class. The object attribute **internship** calls the OrganizeInternee(), a pure virtual function in it and returns the **internship** object. You will get the idea about this in the end that how it works.

## Creating a subclass ReactInternCreator

The ReactInternCreator class is the child class of IntenrhshipManager class. So we had mentioned **public InternshipManager** after the **:** (semicolon) to gain access to public attributes and method of Internhsip class as shown below:

```
class ReactInternCreator : public InternshipManager
{
    public:
    virtual Internship* OrganizeInternee()
    {
        cout<<"React Internee Certificate creator"<<endl;
        return new ReactIntern;
    };
};
```
The **virtual Internship OrganizeInternee()** method is the method of parent class **InternshipManager** which is to be implemented in the subclass. It simply print a single line statement and create the object of **ReactIntern subclass**.

## Creating a subclass NodeJSInternCreator

Similarly, The NodeJSInternCreator class is also the child class of IntenrhshipManager class. So we had again mentioned **public InternshipManager** after the **:** (semicolon) to gain access to public attributes and method of Internhsip class as shown below:

```
class NodeJSInternCreator : public InternshipManager
{
    public:
    virtual Internship* OrganizeInternee()
    {
        cout<<"NodeJS Internee Certificate creatpr"<<endl;
        return new NodeJSIntern;
    };
};
```
The **virtual Internship OrganizeInternee()** method is the method of parent class **InternshipManager** which is to be implemented in the subclass. It simply print a single line statement and create the object of **NodeJSIntern subclass**.

> **So uptil now we have two parent classes and each of them have two subclasses**
> This table sum up our structure of code

| Parent Class       | Internship           | InternshipManager  |
| -------------      |:--------------------:| ------------------:|
| Subclass 1         | ReactIntern          | ReactInternCreator |
| Subclass 2         | NodeJSIntern         | NodeJSInternCreator |

## Final Step - Main Function

The int main() funciton will also create the object of the class circle and call the radiusOfCircle method to print the radius.It also call the **xyz()** function before and after updating the radius attribute using setter method i.e **setRadius(10)** as shown in below code.

```
int main() {
  Internship *intern;
  InternshipManager *internmanager; 
  internmanager = new ReactInternCreator();
  intern=internmanager->Newinternship();
  intern->certificate();
  
  internmanager = new NodeJSInternCreator();
  intern=internmanager->Newinternship();
  intern->certificate();
  return 0;
}
```
Let examine the above main code:

* **Internship intern;** It will create the variable intern.
* **InternshipManager internmanager;** It will create the variable internmanager.
* **internmanager = new ReactInternCreator();** It will create object of ReactInternCreator.
* **intern=internmanager->Newinternship();**  It will call the new internhsip method from internmanager and it will call the OrganizeInternee of internmanager which in return call the OrganizeInternee method of ReactInternCreator
* **intern->certificate();** This will call the method of ReactIntern

The same procedure is for the below code 
```
 internmanager = new NodeJSInternCreator();
  intern=internmanager->Newinternship();
  intern->certificate();
```
  
## Conclusion

Therefore, it obeys the factory method design pattern that allows to define a class for just creating an object but letting the subclasses decides whihc class to instantiate.


