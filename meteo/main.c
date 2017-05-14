#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>
#include <winsock2.h>
#include  <MYSQL/mysql.h>

//la fonction récurpère la date du systeme
char* getDate(){

    time_t rawtime;
    struct tm *info;
    char *buffer;
    buffer = malloc(sizeof(char)*20);
    time( &rawtime );

    info = localtime( &rawtime );

    strftime(buffer,20,"%Y-%m-%d", info);
    return buffer;

}

//la fonction fait le curl sur l'api pour la météo et renvoie la string contenant son resultat
char *getInformations(char *url){
	FILE *file;
	char *string;
    char buffer[2000];
	string = malloc(sizeof(char)*5000);
	strcpy(string, "");
	file = popen(url, "r");
	if(file == NULL){
            exit(-1);
	}
	while(fgets(buffer, 2000, file) != NULL){
        strcat(string, buffer);
	}
	pclose(file);
	return string;
}

//la fonction prend la request en paramètre et l'écrit en bdd
void writeInBdd(char request[5000]){
    MYSQL mysql; //Déclaration du pointeur de structure de type MYSQL

    mysql_init(&mysql); //Initialisation de MySQL
    printf("%s", request);

	if(mysql_real_connect(&mysql,"127.0.0.1","root","","pds",0,NULL,0))
    {

        mysql_query(&mysql, request);
        printf("\nok");
        mysql_close(&mysql); //Fermeture de MySQL
    }
    else
    {
        printf("Une erreur s'est produite lors de la connexion à la BDD!");
    }
}

int main(int argc, char const *argv[])
{
    char results[7][15] = {"", "", "", "", "", "", ""};
    char research[14][20]= {"description\":\"", "\"", "temp\":", ",", "pressure\":", ",","humidity\":", ",", "speed\":", ",", "deg\":", "}", "all\":", "}" };
    int i, k;
    int j = 0;
    char* stringB;
    char* text;
    char request[5000];
    char info[500] = "";
    char* date;
    FILE *file;

    file = fopen("conf.txt", "rb");
    fgets(info, 2000, file);
    text = getInformations(info);

    date = getDate();
    for(i = 0; i < 14; i++){
        if(i %2 != 0){
            if(i == 1){
                stringB = strstr(text+strlen(research[0]), research[i]);
            }else{
                stringB = strstr(text, research[i]);
            }
            strncpy(results[j], text+strlen(research[i-1]), stringB-text-strlen(research[i-1]));
            j++;
        }else{
            text = strstr(text, research[i]);
        }
    }

    sprintf(request, "INSERT INTO meteo(description, temperature, pressure, humidity, vitesse, inclinaison, precipitations, date) VALUES(\'%s\', %s, %s, %s, %s, %s, %s, \'%s\')", results[0], results[1], results[2], results[3], results[4], results[5], results[6], date);
    writeInBdd(request);
    free(date);
	free(text);
	fclose(file);
	return 0;
}
