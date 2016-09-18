// wire.cpp : Defines the entry point for the console application.
//

#include "glut.h"


void displayCone()
{
	glClear(GL_COLOR_BUFFER_BIT|GL_DEPTH_BUFFER_BIT);
	glLoadIdentity();
	glColor3f(0.7,0.5,0.0);
	gluLookAt(2.0,2.0,2.0,0.0,0.0,0.0,0.0,0.0,1.0);
	gluPerspective(60,1,1,1);
	glPushMatrix();
	glTranslatef(1.0,-0.5,0.5);
	glutWireCone(0.7,2.0,30,50);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(1.0,1.0,0.0);
	glColor3ub(0,25,130);
	glutWireSphere(0.75,30.0,50);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-1.0,0.8,0.8);
	glColor3ub(255,50,2);
	glutSolidCube(1);
	glPopMatrix();
	glutSwapBuffers();

}
void reshapeCone(GLint w,GLint h)
{
	glViewport(0,0,500,500);
	glMatrixMode(GL_PROJECTION);
	glLoadIdentity();
	glOrtho(-2.0,2.0,-2.0,2.0,0.0,5.0);
	glMatrixMode(GL_MODELVIEW);

}
void init(void)
{
	glEnable(GL_DEPTH_TEST);
	glEnable(GL_LIGHTING);
	glEnable(GL_LIGHT0);

}
int main(int argc,char** argv)
{
	glutInit(&argc,argv);
	glutInitDisplayMode(GLUT_DOUBLE|GLUT_RGB|GLUT_DEPTH);
	glutInitWindowSize(640,480);
	glutInitWindowPosition(50,50);
	glutCreateWindow("Wire frame");
	glClearColor(1.0,1.0,1.0,1.0);
	glutDisplayFunc(displayCone);
	glutReshapeFunc(reshapeCone);
	glutMainLoop();
	return 0;
}
