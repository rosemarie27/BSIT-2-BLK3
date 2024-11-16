import 'package:awesome_dialog/awesome_dialog.dart';
import 'package:flutter/material.dart';
import 'package:lab_exam/loginscreen.dart';

class Dashboard extends StatelessWidget{
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: DashboardHome(),
    );
  }
}

class DashboardHome extends StatelessWidget{
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      drawer: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: [
            SizedBox(
              height: MediaQuery.of(context).size.height*0.30,
              child: DrawerHeader(
                  decoration: BoxDecoration(
                    color: Colors.blue[100]
                  ),
                  child: Column(
                children: [
                  CircleAvatar(
                    radius: 60,
                    //backgroundImage: AssetImage('images/megumi.jpg'),
                  ),
                  Text('John Phillip Masa'),
                  Text('philjohnmasa@gmail.com')
                ],
              )),
            ),
            ListTile(
              title: Text('Logout'),
              leading: Icon(Icons.power_settings_new),
              onTap: (){
                Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context)=>LoginScreen()));
              },
            )
          ],
        ),
      ),
      appBar: AppBar(
        title: Text('Lab Exam Midterm'),
        centerTitle: true,
        backgroundColor: Colors.blue,
      ),
      body: Center(
        child: Card(
          color: Colors.blue[50],
          child: Column(
            mainAxisSize: MainAxisSize.min,
             children: [
                CircleAvatar(
                 //backgroundImage: AssetImage('images/megumi.jpg'),
                 radius: 50,
               ),
               Text('Masa, John Phillip D.'),
               Text('Bachelor of Science in Information Technology'),
               Row(
                 mainAxisSize: MainAxisSize.min,
                 children: [
                   ElevatedButton(onPressed: (){},
                       child: Text('Add')
                   ),
                   ElevatedButton(onPressed: (){}, child: Text('Follow'))
                 ],
               )
             ],
          ),
        ),
      ),
    );
  }
}
