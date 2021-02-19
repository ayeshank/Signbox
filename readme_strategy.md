# Strategy Design Pattern - in c++
In Strategy pattern, a class behavior or its algorithm can be changed at run time. This type of design pattern comes under behavior pattern.
In Strategy pattern, we create objects which represent various strategies and a context object whose behavior varies as per its strategy object. The strategy object changes the executing algorithm of the context object.

## Include Headers

```
#include <iostream>
using namespace std;
```
 iostream provides basic input and output services for C++ programs. So when we run a program to print something, “using namespace std” says if you find something that is not declared in the current scope go and check std. using namespace std; are used. It is because computer needs to know the code for the cout, cin functionalities and it needs to know which namespace they are defined.

## Creating a Parent Class Strategy

 To understand the Strategy design pattern. Lets make a class called Strategy.

```
class Strategy
{
    public:
    virtual void AlgoInterface()=0;
};
```
It has a **virtual void AlgoInterface()** whihc is implemented in subclasses.

## Creating SubClasses

We will implement three subclasses as shown below each of them we implement the **virtual void AlgoInterface()** of Parent's Class i.e **Strategy**
```
class FirstStrategy : public Strategy
{
    public:
    void AlgoInterface()
    {
        cout << "I am First Strategy \n"<<endl; 
    }
};
class SecondStrategy : public Strategy
{
    public:
    void AlgoInterface()
    {
        cout << "I am Second Strategy \n"<<endl; 
    }
};

class ThirdStrategy : public Strategy
{
    public:
    void AlgoInterface()
    {
        cout << "I am Third Strategy \n"<<endl; 
    }
};
```

## Creating class Context

```
class Context
{
    private:
    Strategy *strategy;
    public:
    void setStrategy(Strategy *obj)
    {
        strategy=obj;
    }
    Strategy *getStrategy()
    {
        return strategy;
    }
    void ContextInterface()
    {
        strategy->AlgoInterface();
    }
};
```
The context class consist of private object i.e. **Strategy *strategy;** .It also have a **setStrategy** to set the obj of strategy class and get the strategy obj from **Strategy *getStrategy()**. The **ContextInterface()** will call the **AlgoIterface()** function of parent class **Strategy** which in turn call the subclass **AlgoIterface()** 

## Final Step - Main Function

The int main() function will create the objects for each of the subclasses and **context** class and assign the objects of subclaases to the method of context class through **con** obj.

```
int main() {
    Context *con=new Context();
    FirstStrategy *fs=new FirstStrategy();
    con->setStrategy(fs);
    con->ContextInterface();
    
    SecondStrategy *ss=new SecondStrategy();
    con->setStrategy(ss);
    con->ContextInterface();
    
    ThirdStrategy *ts=new ThirdStrategy();
    con->setStrategy(ts);
    con->ContextInterface();
    return 0;
}
```

## Conclusion

Therefore, it obeys the strategy design pattern we had created objects/subclasses which represent various strategies and a context object whose behavior varies as per the strategy object.
