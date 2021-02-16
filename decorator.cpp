// Online C++ compiler to run C++ program online
#include <iostream>
using namespace std;
class Human
{
    public:
    virtual void Operation()=0;
};
class ConcreteHuman : public Human
{
    public:
    void Operation()
    {
        cout << "I am Concrete human \n"<<endl; 
    }
};
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
int main() {
    Human *me=new FirstHumanDecorator(new SecondHumanDecorator(new ConcreteHuman()));
    me->Operation();
    return 0;
}