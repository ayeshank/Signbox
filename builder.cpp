#include <iostream>
using namespace std;
class Helicopter{
    string _heli;
    string _engine;
public:
    Helicopter(string heliType):_heli{heliType} {}
    void setEngine(string type) 
    { 
        _engine = type; 
    }
    string getEngine()          
    { 
        return _engine; 
    }
    void show() {
    	cout <<_heli << " has " <<_engine << endl;
    }
};
class HelicopterBuilder{
protected:
    Helicopter *_heli;
public:
    virtual void getPartsDone() = 0;
    virtual void buildEngine() = 0;
    Helicopter* getHeli(){ return _heli; }
};
class NavyBuilder: public HelicopterBuilder {
public:
    void getPartsDone() 
    { 
        _heli = new Helicopter("Navy Helicopter"); 
    }
    void buildEngine() 
    { 
        _heli->setEngine("Navy Engine");   
    }
};
class ArmyBuilder: public HelicopterBuilder {
public:
    void getPartsDone() 
    {
        _heli = new Helicopter("Army Helicopter"); 
    }
    void buildEngine()  
    { 
        _heli->setEngine("Army Engine");   
    }
};
class Director{
    HelicopterBuilder *builder;
public:
    Helicopter* createHeli(HelicopterBuilder *builder) {
        builder->getPartsDone();
        builder->buildEngine();
        return builder->getHeli();
    }
};
int main() 
{	
    Director dir;
    ArmyBuilder a;
    NavyBuilder b;
	Helicopter *army = dir.createHeli(&a);
	Helicopter *navy = dir.createHeli(&b);
	army->show();
	navy->show();
	return 0;
}