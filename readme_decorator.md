# Decorator Design Pattern - in c++
Decorator pattern allows a user to add new functionality to an existing object without altering its structure. This type of design pattern comes under structural pattern as this pattern acts as a wrapper to existing class.
This pattern creates a decorator class which wraps the original class and provides additional functionality keeping class methods signature intact.

## Include Headers

```
#include <iostream>
using namespace std;
```
 iostream provides basic input and output services for C++ programs. So when we run a program to print something, “using namespace std” says if you find something that is not declared in the current scope go and check std. using namespace std; are used. It is because computer needs to know the code for the cout, cin functionalities and it needs to know which namespace they are defined.

## Creating a Parent Class Human

 To understand the docrator design pattern. Lets make a class called Human.

```
class Human
{
    public:
    virtual void Operation()=0;
};
```
It have its pure virtual method called **Operation** that has to be implemented in its child/subclasses.
Now we will see how this method will be implemented in the child class

## Creating a subclass ConcreteHuman

The ConcreteHuman class is the child class of Intenrhsip class. So we had mentioned **public Human** after the **:** (semicolon) to gain access to public attributes and method of Human class as shown below:

```
class ConcreteHuman : public Human
{
    public:
    void Operation()
    {
        cout << "I am Concrete human \n"<<endl; 
    }
};
```
The **void Operation()** method is the method of parent class **Human** which is to be implemented in the subclass. It simply print a single line statement.

## Creating a subclass HumanDecorator

The HumanDecorator class is the child class of Intenrhsip class. So we had mentioned **public Human** after the **:** (semicolon) to gain access to public attributes and method of Human class as shown below:
The HumanDecorator class has a private object attribute i.e. **Human *human** as shown below: 
```
class HumanDecorator : public Human
{
    private:
    Human *human;
    public:
    HumanDecorator(Human *obj)
    {
        human=obj;
    }
     void Operation()
    {
        cout<<"I am Human Decorator :)"<<endl;
        human->Operation();
    };
};

```
The **HumanDecorator(Human *obj)** is a constructor used to assign a passed **obj** to the **human** object. The **void Operation()** method is the method of parent class **Human** which is to be implemented in the subclass. It simply print a single line statement and call the Operation mehtod of Parent class.

## Creating a subclass FirstHumanDecorator

The FirstHumanDecorator class is the child class of HumanDecorator class. So we had mentioned **public HumanDecorator** after the **:** (semicolon) to gain access to public attributes and method of HumanDecorator class as shown below:

```
class FirstHumanDecorator : public HumanDecorator
{
  private:
  int addedState;
  public:
  FirstHumanDecorator(Human *obj): HumanDecorator(obj)
  {
      addedState=0;
  }
    void Operation()
    {
        HumanDecorator::Operation();
        addedState=1;
        cout<<"I am First Human Decorator :) and my addedState is "<< addedState<< endl;
    };
};
```
The **FirstHumanDecorator(Human *obj)** is a constructor used to assign a passed **obj** to the **HumanDecorator** object. The **void Operation()** method will call the operation method of the parent class **HumanDecorator** and add the additional print statement in it. The **addedState**  is just to indicate that the **void Operation()** of 
**FirstHumanDecorator** class will add the additional cout statement to the parent's **void Operation()**

## Creating a subclass SecondHumanDecorator

The SecondHumanDecorator class is the child class of HumanDecorator class. So we had mentioned **public HumanDecorator** after the **:** (semicolon) to gain access to public attributes and method of HumanDecorator class as shown below:

```
class SecondHumanDecorator : public HumanDecorator
{
  private:
  int addedState;
  public:
  SecondHumanDecorator(Human *obj): HumanDecorator(obj)
  {
      addedState=0;
  }
    void Operation()
    {
        HumanDecorator::Operation();
        addedState=1;
        cout<<"I am Second Human Decorator :)" <<endl;
        AddedBehaviour();
    };
    void AddedBehaviour()
    {
    cout<<"I am Second Human Decorator's AddedBehaviour :)" <<endl;
    }
};
```
The **SecondHumanDecorator(Human *obj)** is a constructor used to assign a passed **obj** to the **HumanDecorator** object. The **void Operation()** method will call the operation method of the parent class **HumanDecorator** and add the additional print statement in it. The **addedState** and **void AddedBehaviour()** is just to indicate that the **void Operation()** of **SecondHumanDecorator** class will add the additional two cout statement to the parent's **void Operation()**.


> **So uptil now the hierarchy of the above code structure can be shown as:**

+-- Human - Parent Class
|   +-- ConcreteHuman
|   +-- HumanDecorator
|   |   +--FirstHumanDecorator
|   |   +--SecondHumanDecorator


## Final Step - Main Function

The int main() funciton will also create the object of the class circle and call the radiusOfCircle method to print the radius.It also call the **xyz()** function before and after updating the radius attribute using setter method i.e **setRadius(10)** as shown in below code.

```
int main() {
    Human *me=new FirstHumanDecorator(new SecondHumanDecorator(new ConcreteHuman()));
    me->Operation();
    return 0;
}
```
The above code might look confusing but let first examine the above code:

* **Human *me=new FirstHumanDecorator(new SecondHumanDecorator(new ConcreteHuman()));** As all the classes are with inheritance to one and each other the objects are been called in the nested manner.
>Very firstly the **ConcreteHuman** object will be created and the **void Operation** has been initialized.
>Then the **SecondHumanDecorator** object will be created and the **void Operation** has been initialized with the additional implementation of the **SecondHumanDecorator** class in the parent's **void Operation** method.
>Then the **FirstHumanDecorator** object will be created and the **void Operation** has been initialized with the additional implementation of the **FirstHumanDecorator** class in the parent's **void Operation** method.
* **me->Operation();** It will call only the single function of the parent class **Human** but that will nestedly call the additional **void Operation** code of subclasses.

## Conclusion

Therefore, it obeys the decorator design pattern allows a user to add new functionality to an existing object without altering its structure. This type of design pattern comes under structural pattern as this pattern acts as a wrapper to existing class.


