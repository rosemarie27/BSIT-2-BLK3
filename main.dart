import 'package:valenciajj_b3/async_program.dart';

import'calculate.dart';

void main() async{
  Calculate calculator = Calculate();
  int addResult = calculator.addition(1,2);
  print("The result for addition is: $addResult");

  int addResult1 = calculator.sub(1,2);
  print("The result for sub is: $addResult1");

  int addResult2 = calculator.multi(1,2);
  print("The result for multi is: $addResult2");

  double addResult3 = calculator.divide(1,2);
  print("The result for divide is: $addResult3");

  AsyncProgram ap=AsyncProgram();
  var users = await ap.getUsers();
  for(int i=0; i<users.length; i++){
    print(users[i]['name']);
  }
}
