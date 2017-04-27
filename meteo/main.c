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

//la fonction fait le curl sur l'api pour la météo et renvoie la chaine contenant son resultat
char *getInformations(){
	FILE *file;
	char *chaine;
    char buffer[2000];

	chaine = malloc(sizeof(char)*5000);
	strcpy(chaine, "");
	file = popen("curl \"http://api.openweathermap.org/data/2.5/weather?id=3019265&appid=4530f696e6e24c57b4ed248cdce5b64b&lang={fr}\"", "r");
	if(file == NULL){
            exit(-1);
	}
	while(fgets(buffer, 2000, file) != NULL){
        strcat(chaine, buffer);
	}
	pclose(file);
	return chaine;
}

//la fonction prend la requete en paramètre et l'écrit en bdd
void writeInBdd(char requete[5000]){
    MYSQL mysql; //Déclaration du pointeur de structure de type MYSQL

    mysql_init(&mysql); //Initialisation de MySQL
    printf("%s", requete);

	if(mysql_real_connect(&mysql,"127.0.0.1","root","","pds",0,NULL,0))
    {

        mysql_query(&mysql, requete);
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
    char resultats[7][15] = {"", "", "", "", "", "", ""};
    char recherches[14][20]= {"description\":\"", "\"", "temp\":", ",", "pressure\":", ",","humidity\":", ",", "speed\":", ",", "deg\":", "}", "all\":", "}" };
    int i;
    int j = 0;
    char* chaineB;
    char* texte;
    char requete[5000];
    char* date;

    date = getDate();
    texte = getInformations();
    for(i = 0; i < 14; i++){
        if(i %2 != 0){
            if(i == 1){
                chaineB = strstr(texte+strlen(recherches[0]), recherches[i]);
            }else{
                chaineB = strstr(texte, recherches[i]);
            }
            strncpy(resultats[j], texte+strlen(recherches[i-1]), chaineB-texte-strlen(recherches[i-1]));
            printf("%s\n", resultats[j]);
            j++;
        }else{
            texte = strstr(texte, recherches[i]);
        }
    }
    sprintf(requete, "INSERT INTO meteo(description, temperature, pressure, humidity, vitesse, inclinaison, precipitations, date) VALUES(\'%s\', %s, %s, %s, %s, %s, %s, \'%s\')", resultats[0], resultats[1], resultats[2], resultats[3], resultats[4], resultats[5], resultats[6], date);
    writeInBdd(requete);
    free(date);
	free(texte);
	return 0;
}
