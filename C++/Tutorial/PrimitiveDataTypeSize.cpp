#include <iostream>
#include <climits>

using namespace std;
// TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
int main()
{

    cout << "Size of bool : " << sizeof(bool) << " bytes" << endl;
    cout << "Size of char : " << sizeof(char) << " bytes" << endl;
    cout << "Size of short : " << sizeof(short) << " bytes" << endl;
    cout << "Size of int : " << sizeof(int) << " bytes" << endl;
    cout << "Size of float : " << sizeof(float) << " bytes" << endl;
    cout << "Size of wchar_t : " << sizeof(wchar_t) << " bytes" << endl;

    cout << "Size of long : " << sizeof(long) << " bytes" << endl;
    cout << "Size of double : " << sizeof(double) << " bytes" << endl;
    cout << "Size of long long : " << sizeof(long long) << " bytes" << endl;
    cout << "Size of long double : " << sizeof(long double) << " bytes" << endl;

    int age {0};
    cout << "Size of age : " << sizeof(age) << " bytes" << endl;



    return 0;
}
