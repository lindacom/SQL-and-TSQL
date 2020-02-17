Sql Server Integration Services Catalogue (SSIS)
==================================================

SSIS is used for data integration and workflow. It is used for the deployment of development packages.

Data integration explained
---------------------------

The advantages of data integration are that it reduces data complexity, data integrity, easy data collaboration, smarter business decisions.

You can use a collection of different processes for data integration.

Data modelling - create a model and then perform operations on it
Data profiling - sample data and see if there are inconsistencies

Data integration process
-----------------------

1. Operational data - operation systems containing data.
Operational data store (ODS) integrates data from different sources.

2. ETL, data warehouse and OLAP - you perform ETL using SSIS package
ETL - extract, transform (to required format) and load (load and index) data. Then load into a data warehouse.
Data warehouse - store of data from different sources for business use
OLAP - analytical processing

3. Business users - perform analysis

Creating a development package
==============================

1. Download Sql Server data tools for visual studio (SSDT)
2. Create an SSIS package 

SSDT
----

SSDT is used to create a project.

In visual studio create a new integration services project.  The project opens with five tabs

a. Control flow

b. Data flow (you can load data e.g. csv file. N.b. when a red cross shows you need to create a connection manager for the csv file)

c. parameters

d. event handlers

e. package explorer

In the solution explorer you can see various menus

In SSIS toolbox drag items into the work area of the data flow screen.

e.g. Extraction - you could drag the flat file source and upload a csv file
Transformation - you could drag the derived column to add a column to the data
Loading - you could drag the ADO NET destination 

Next open the database in SSMS

SSIS
======

An SSIS package consists of control flow elements (handles workflow) and data flow elements (handles data transformation)

Create a catalogue
------------------
Right click Integration Services catalogue folder and select create catalogue.
Enter a password for the master key
Click ok and an SSIS db is created under the folder

Create a folder
--------------
Right click the catalogue and select create folder
Enter a folder name

N.b. a projects folder will be created automatically.
