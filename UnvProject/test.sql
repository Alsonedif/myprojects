===========================================================================================Q : Explain array declaration ? Q=========================================================================================================
A: 
an array declaration has two components: the array's type and the array's name
ex :
int[] anArray;

===========================================================================================Q:How we can assign memory to an array? Q=================================================================================================
A:
By putting the number of memory of the same data type  you want

ex :
int[] anArray = new int[n];

===========================================================================================Q:Write a step by step process for declaration, memory allocation and accessing element for an Array in java? Q============================
A:
STEP 1 : 
Choose a data type and how many variables you want of the same data type
STEP 2 : Declaration
Say you chose int data type 
int[] anArray;
STEP 3 : memory allocation
and you want 2 varibles of the same data type
anArray = new int[2];
(it goes from 0 to 4)
STEP 4 : accessing element
Choosing the number of the varible
anArray[0] = 2;
anArray[1] = 3;
System.out.println(anArray[0]+anArray[1]);
==========================================================================================Q:Write a java program using Array. Note: your program should have at least 10 statements. Q================================================
public static void main (String[] args){
int math[]={1,2,3,4,5,6};
System.out.println(math[0]-math[1]);
System.out.println(math[2]+math[3]);
System.out.println(math[4]/math[5]);
System.out.println(math[1] * math[2]);
System.out.println(math[1]>math[2]);
System.out.println(math[1]<math[2]);
System.out.println(math[0]>=math[3]);
System.out.println(math[1]==math[5]);
System.out.println(math[2]+math[1]/math[3]);
System.out.println(math[1]+math[2]*math[0]);
}
=========================================================================================Q:Draw the flow chart of while loop? Q=========================================================================================================
Will includ it in Attachments (email)
=========================================================================================Q:Draw the flow chart of do-while loop? Q====================================================================================================
Will includ it in Attachments (email)
=========================================================================================Q:Draw the flow chart of For-loop? Q=========================================================================================================
Will includ it in Attachments (email)
=========================================================================================Q: Write a java program using while loop. Note: your program should have at least 10 statements Q============================================
public static void main(String[] args){
int a;
int b;
int c;
a=1;
b=2;
c=3;

while(a<b && a<c){
system.out.println("normal a="+a);
a++;
system.out.println("updated a ="+a);
}
}
========================================================================================Q:Write a java program using do-while. Note: your program should have at least 10 statements Q==============================================
public static void main(String[] args){

int a;
int b;
int c;
a=1;
b=2;
c=3;
do {
a++;
b++;
c++;
}while(a<b && b<c);

}
========================================================================================Q:Write a java program using For-loop. Note: your program should have at least 10 statements Q===============================================
public static void main(String[] args){
int a;
int b=11;
for(a=0;a<b;a++)
system.out.println("this for loop");
system.out.println("it will add one until it satsfie the condition")
System.out.println("this is the value of a= "+a);
========================================================================================Q:What is an object in JAVA? Q===============================================================================================================
Objects have states and behaviors. Example: A dog has states - color, name, breed as well as behaviors
========================================================================================Q:What is a class in java? Q==================================================================================================================
A class, in the context of Java, are templates that are used to create objects, and to define object data types and methods
========================================================================================Q:Write a java program using for explaining objects and classes in java Q====================================================================


========================================================================================Q:Write two characteristics of java objects? Q==============================================================================================
1-state
2-Behiver
3-idenity









































