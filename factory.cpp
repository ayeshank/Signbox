#include <iostream>
using namespace std;
// create a class internship with pure virtual function
class Internship
{
    public:
    virtual void certificate()=0;
};
//create a class reactintern which derived from internhsip class
//and implements the certificate method of it
class ReactIntern : public Internship
{
    public:
    virtual void certificate()
    {
        cout<<"React Internee Certificate"<<endl;
    };
};
//create a class nodejsintern which derived from internhsip class
//and implements the certificate method of it
class NodeJSIntern : public Internship
{
    public:
    virtual void certificate()
    {
        cout<<"NodeJS Internee Certificate"<<endl;
    };
};
// create a class internshipmanager having the data member of 
// class internship
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
class ReactInternCreator : public InternshipManager
{
    public:
    virtual Internship* OrganizeInternee()
    {
        cout<<"React Internee Certificate creator"<<endl;
        return new ReactIntern;
    };
};
// creates an object of NodeJSINTERN
class NodeJSInternCreator : public InternshipManager
{
    public:
    virtual Internship* OrganizeInternee()
    {
        cout<<"NodeJS Internee Certificate creatpr"<<endl;
        return new NodeJSIntern;
    };
};
int main()
{
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