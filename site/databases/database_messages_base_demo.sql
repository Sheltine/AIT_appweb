----
-- phpLiteAdmin database dump (https://bitbucket.org/phpliteadmin/public)
-- phpLiteAdmin version: 1.9.6
-- Exported: 9:47am on October 29, 2018 (UTC)
-- database file: /usr/share/nginx/databases/database.sqlite
----
BEGIN TRANSACTION;

----
-- Drop table for messages
----
DROP TABLE "messages";

----
-- Table structure for messages
----
CREATE TABLE 'messages' ('id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 'reception_time' DATETIME NOT NULL, 'sender' TEXT, 'receiver' TEXT,'subject' TEXT DEFAULT 'false','corpus' TEXT DEFAULT 0 );

----
-- Data dump for messages, a total of 9 rows
----
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('0','10.10.18','Sheltine','nyahon','Coucou','J''espère que t''aimes la soupe, j''en ai plein.');
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('45','25-10-2018','Sheltine','Mr_rubinstein','STI - projet en cours','Bonjour, un simple message pour vous demander s''il était possible à notre époque de développer quelque chose d''économique à l''exécution, telle qu''une app standalone sans librairies ? 
Meilleures salutations. ');
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('50','27-10-2018','The_Donald','Mr_rubinstein','Mexicans - They steal our jobs !','It''s clear to me that we are in a BAD! spot today and we must DRAIN THE SWAMP!
Follow me, and I''ll give you a millenial Reich!');
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('68','28-10-2018','nyahon','Sheltine','Hello','Tu vas bien?');
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('69','29-10-2018','nyahon','Mr_rubinstein','AST - so many questions','Bonjour, suite au développement d''AST, de nombreuses questions apparaissent.
Pourriez-vous m''aider ? ');
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('70','29-10-2018','Mr_rubinstein','nyahon','AST - so many questions','Bien sûr, que puis-je faire pour vous ? ');
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('71','29-10-2018','nyahon','Mr_rubinstein','AST - so many questions','Par exemple, j''ai faim et aurais bien besoin d''une bonne purée. 
Connaissez-vous une recette ? ');
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('72','29-10-2018','Mr_rubinstein','nyahon','RE: AST - so many questions','Je connais effectivement une bonne purée. 
Voyez plutôt : du beurre, des patates et du lait. ');
INSERT INTO "messages" ("id","reception_time","sender","receiver","subject","corpus") VALUES ('73','29-10-2018','nyahon','Mr_rubinstein','RE: RE: AST - so many questions','En voilà une bonne purée. Merci beaucoup!');
COMMIT;
