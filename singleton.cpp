#include <iostream>
using namespace std;
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
		cout << "Radius Of Circle: " << 3.142*radius << endl;
	}
};
Circle *Circle::instance = NULL;
void xyz () {
	Circle *inst = Circle::getInstance();
	inst->radiusOfCircle();
}
int main() {

	Circle *inst = Circle::getInstance();
	inst->radiusOfCircle();
	xyz();
	inst->setRadius(10);
	xyz();
	return 0;
}