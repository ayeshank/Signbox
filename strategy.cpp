#include <iostream>
using namespace std;
class Strategy
{
    public:
    virtual void AlgoInterface()=0;
};
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