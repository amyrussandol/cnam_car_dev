drop database if exists cnam_car_base;
create database cnam_car_base;
        use cnam_car_base;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Agence
#------------------------------------------------------------

CREATE TABLE Agence(
        Num_AG   int (11) Auto_increment  NOT NULL ,
        Nom_AG   Varchar (20) NOT NULL ,
        Rue_AG   Varchar (50) NOT NULL ,
        Ville_AG Varchar (25) NOT NULL ,
        CP_AG    Int NOT NULL ,
        Tel_AG   Int NOT NULL ,
        PRIMARY KEY (Num_AG )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Car
#------------------------------------------------------------

CREATE TABLE Car(
        Num_Car      int (11) Auto_increment  NOT NULL ,
        Ima_Car      Char (7) NOT NULL ,
        Date_Cir_Car Date NOT NULL ,
        Kim_Car      Int NOT NULL ,
        Etat_Car     Varchar (10) NOT NULL ,
        Num_AG       Int NOT NULL ,
        Num_Carbu    Int ,
        Num_Mod      Int ,
        PRIMARY KEY (Num_Car )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilitaire
#------------------------------------------------------------

CREATE TABLE Utilitaire(
        Vol_Ut   Double NOT NULL ,
        Charg_Ut Int NOT NULL ,
        Long_Ut  Double NOT NULL ,
        Larg_Ut  Double NOT NULL ,
        Haut_Ut  Double NOT NULL ,
        Num_Mod  Int NOT NULL ,
        PRIMARY KEY (Num_Mod )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        Num_Cat Int NOT NULL ,
        Nom_Cat Varchar (10) NOT NULL ,
        PRIMARY KEY (Num_Cat )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client Fidele
#------------------------------------------------------------

CREATE TABLE Client_Fidele(
        Civ_Cli    Varchar (3) NOT NULL ,
        Nom_Cli    Varchar (25) NOT NULL ,
        Prenom_Cli Varchar (25) NOT NULL ,
        Rue_Cli    Varchar (25) NOT NULL ,
        Ville_Cli  Varchar (25) NOT NULL ,
        CP_Cli     Int NOT NULL ,
        Tel_Cli    Char (10) NOT NULL ,
        Num_User   Int NOT NULL ,
        PRIMARY KEY (Num_User )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Points
#------------------------------------------------------------

CREATE TABLE Points(
        Num_Tr_Pt Int NOT NULL ,
        Nb_Tr_Pt  Int NOT NULL ,
        PRIMARY KEY (Num_Tr_Pt )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Location
#------------------------------------------------------------

CREATE TABLE Location(
        Num_Loc        int (11) Auto_increment  NOT NULL ,
        Date_Loc       Datetime NOT NULL ,
        Date_Debut_Loc Date NOT NULL ,
        Date_Fin_Loc   Date NOT NULL ,
        Duree_Loc      Int ,
        Pu_TTC_Loc     Int ,
        Num_User       Int ,
        Num_AG         Int NOT NULL ,
        Num_Car        Int NOT NULL ,
        Num_AG_Agence  Int NOT NULL ,
        Num_Tr_Pt      Int NOT NULL ,
        PRIMARY KEY (Num_Loc )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tourisme
#------------------------------------------------------------

CREATE TABLE Tourisme(
        Toit_Tou      Varchar (12) NOT NULL ,
        Clim_Tou      Char (3) NOT NULL ,
        Nb_Bagage_Tou Int NOT NULL ,
        GPS_Tou       Char (3) NOT NULL ,
        Nb_Place_Tou  Int ,
        Num_Mod       Int NOT NULL ,
        PRIMARY KEY (Num_Mod )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Carburant
#------------------------------------------------------------

CREATE TABLE Carburant(
        Num_Carbu Int NOT NULL ,
        Nom_Carbu Varchar (7) NOT NULL ,
        PRIMARY KEY (Num_Carbu )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Modele
#------------------------------------------------------------

CREATE TABLE Modele(
        Num_Mod       int (11) Auto_increment  NOT NULL ,
        Nom_Mod       Varchar (25) ,
        Marq_Mod      Varchar (15) ,
        Prix_Jour_Mod Int NOT NULL ,
        Img_Mod       Varchar (50) ,
        Num_Cat Int  ,
        PRIMARY KEY (Num_Mod )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Espace User
#------------------------------------------------------------

CREATE TABLE Espace_User(
        Num_User      int (11) Auto_increment  NOT NULL ,
        Mel_User      Varchar (40) NOT NULL ,
        Pass_User     Varchar (250) NOT NULL ,
        Droit_User    Int ,
        Date_Ins_User Date ,
        Type_Carte    Varchar (25) ,
        PRIMARY KEY (Num_User )
)ENGINE=InnoDB;

ALTER TABLE Car ADD CONSTRAINT FK_Car_Num_AG FOREIGN KEY (Num_AG) REFERENCES Agence(Num_AG);
ALTER TABLE Car ADD CONSTRAINT FK_Car_Num_Carbu FOREIGN KEY (Num_Carbu) REFERENCES Carburant(Num_Carbu);
ALTER TABLE Car ADD CONSTRAINT FK_Car_Num_Mod FOREIGN KEY (Num_Mod) REFERENCES Modele(Num_Mod);
ALTER TABLE Utilitaire ADD CONSTRAINT FK_Utilitaire_Num_Mod FOREIGN KEY (Num_Mod) REFERENCES Modele(Num_Mod);
ALTER TABLE Client_Fidele ADD CONSTRAINT FK_Client_Fidele_Num_User FOREIGN KEY (Num_User) REFERENCES Espace_User(Num_User);
ALTER TABLE Location ADD CONSTRAINT FK_Location_Num_User FOREIGN KEY (Num_User) REFERENCES Espace_User(Num_User);
ALTER TABLE Location ADD CONSTRAINT FK_Location_Num_AG FOREIGN KEY (Num_AG) REFERENCES Agence(Num_AG);
ALTER TABLE Location ADD CONSTRAINT FK_Location_Num_Car FOREIGN KEY (Num_Car) REFERENCES Car(Num_Car);
ALTER TABLE Location ADD CONSTRAINT FK_Location_Num_AG_Agence FOREIGN KEY (Num_AG_Agence) REFERENCES Agence(Num_AG);
ALTER TABLE Location ADD CONSTRAINT FK_Location_Num_Tr_Pt FOREIGN KEY (Num_Tr_Pt) REFERENCES Points(Num_Tr_Pt);
ALTER TABLE Tourisme ADD CONSTRAINT FK_Tourisme_Num_Mod FOREIGN KEY (Num_Mod) REFERENCES Modele(Num_Mod);
ALTER TABLE Modele ADD CONSTRAINT FK_Modele_Num_Cat FOREIGN KEY (Num_Cat) REFERENCES Categorie(Num_Cat);
