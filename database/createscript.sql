-- Step - 01
-- *************************************************************************
-- Doel - maak een nieuwe database aan met de naam "AchtbaanDB"
-- *************************************************************************
-- versie       Datum           Auteur      Wijzigingen
-- 1.0          2025-03-12      Irwan.G    script aangemaakt
-- *************************************************************************

DROP DATABASE IF EXISTS AchtbaanDB;
CREATE DATABASE AchtbaanDB;
USE AchtbaanDB;

-- Step - 02
-- *************************************************************************
-- Doel - maake nieuwe tabel "HoogsteAchtbaanVanEuropa"
-- *************************************************************************
-- versie       Datum           Auteur      Wijzigingen
-- 1.0          2025-03-12      Irwan.G    script aangemaakt
-- *************************************************************************

CREATE TABLE Rollercoaster (
     Id                 SMALLINT    UNSIGNED    NOT NULL    PRIMARY KEY AUTO_INCREMENT
    ,NameRollerCoaster  VARCHAR(50)             NOT NULL
    ,NameAmusementPark  VARCHAR(50)             NOT NULL
    ,Country            VARCHAR(50)             NOT NULL  
    ,TopSpeed           SMALLINT    UNSIGNED    NOT NULL
    ,Height             TINYINT     UNSIGNED    NOT NULL
    ,BuildYear          YEAR                    NOT NULL
    ,IsActive           BIT                     NOT NULL    DEFAULT 1
    ,Remark             VARCHAR(255)                NULL    DEFAULT NULL
    ,CreatedAt          DATETIME(6)             NOT NULL    DEFAULT NOW(6)
    ,ChangedAt          DATETIME(6)             NOT NULL    DEFAULT NOW(6)
) ENGINE=InnoDB;

-- Step - 03
-- *************************************************************************
-- Doel - vul de tabel "HoogsteAchtbaanVanEuropa" met data.
-- *************************************************************************
-- versie       Datum           Auteur      Wijzigingen
-- 1.0          2025-03-12      Irwan.G    script aangemaakt
-- *************************************************************************

INSERT INTO Rollercoaster (
     NameRollerCoaster
    ,NameAmusementPark
    ,Country
    ,TopSpeed
    ,Height
    ,BuildYear
) VALUES
 ('Kingda Ka', 'Six Flags Great Adventure', 'United Kingdom', 206, 127, 2005)
,('Red Force', 'Ferrari Land', 'Spain', 180, 112, 2017)
,('Hyperion', 'Energylandia', 'Poland', 142, 77, 2018)
,('Shambhala', 'PortAventura Park', 'Spain', 134, 76, 2012)
,('Schwur des Kärnan', 'Hansa Park', 'Germany', 127, 73, 2015); 